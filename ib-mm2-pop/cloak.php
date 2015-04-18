<?php

	/*
	 *  This cloak uses mysqli and prepared statements to execute queries.  Each user is cloaked
	 *	unless a reason is found not to cloak the user.  This could include duplicate IP's, proxies,
	 *  city requirements, etc.
	 * 
	 *	Reference maxmind for the name of cities to cloak.
	 */

	require_once 'libs/mobile_detect.php';

	class Cloak {

		public $WHITE_IPS = array(
			'94.195.58.135', // Grant Flat
		);
		public $whiteList = false;
		public $forceClean = false;
		public $CONFIG = array();

		public function __construct($cloak_config) {
			$this->CONFIG = $cloak_config;

			//Logging for Development
			if ($this->CONFIG['env'] != 'prod') {
				ini_set('display_errors', 1);
				error_reporting(E_ALL ^ E_NOTICE);
			}

			//Is this person whitelisted?
			$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'No Remote Address';
			if (in_array($ip, $this->WHITE_IPS)) {
				$this->whiteList = true;
			}

			//force clean option set public global
			if ($this->CONFIG['force_clean']) {
				$this->forceClean = true;
			}
		}

		public function showCloak() {
			return $this->cloakUser();
		}


		/*
		*	This is the private function that will check to see if the page with the $this->CONFIG['page_id']
		*	passed in id in the collection mode, if so always cloak and collect info for later!
		*
		*/
		private function isPageBeingCollected() {

			// Dont Record!!! RETURN - Do Nothing! THIS IS US ;)
			if ($this->whiteList) {
				return false;
			}

			$cloak_endabled = true;
			// IP Database Connection Credentials
			$pages_db_creds = $this->CONFIG['pages_db_creds'];

			// Connect to mysql
			$switch_mysqli = mysqli_connect($pages_db_creds['host'], $pages_db_creds['user'], $pages_db_creds['pass'], $pages_db_creds['database']);
			if($switch_mysqli->connect_error) die('failed to connect');

			if ($switch_mysqli) {
				
				$result = mysqli_query( $switch_mysqli, ("SELECT * FROM " . $pages_db_creds['table'] . " WHERE id = " . $this->CONFIG['page_id']) );

				if ( !$result ) {
					$cloak_endabled = false;
				} else {
					if (mysqli_num_rows($result) > 0) {
						$row = mysqli_fetch_array($result);
						if ($row['status']) {
							$cloak_endabled = true;	
						} else {
							$cloak_endabled = false;
						}
					} else {
						$cloak_endabled = false;
					}
				}
			} else {
				$cloak_endabled = false;
			}
			return $cloak_endabled;
		}


		/*
		*	This is theprivate function that runs through the tests that decide if the user
		*	should be shown the cloak based on collected data, on a proxy, country, device, etc...
		*
		*/
		private function cloakUser() {

			$show_clean = false;

			// All SQL Insert Variables
			$ip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'No Remote Address';
			$referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '';
			$device_os = '';
			$proxy = 0;
			$proxy_ip = 0;	
			$duplicate = 0;
			$city = '';
			$mobile_detect = new Mobile_Detect;
			$device_type = ($mobile_detect->isMobile() ? ($mobile_detect->isTablet() ? 'tablet' : 'phone') : 'computer');

			// Did they click on an add or put link in url
			if ( $this->CONFIG['ignore_referrer'] ) {
				//Dont mind the referrer
			} else {
				if ($referrer == '') {
					$show_clean = true;
				}
			}
			
			// Is the user behind a proxy, if so, show clean
			$proxy_headers = array(
			        'HTTP_VIA',
			        'HTTP_X_FORWARDED_FOR',
			        'HTTP_FORWARDED_FOR',
			        'HTTP_X_FORWARDED',
			        'HTTP_FORWARDED',
			        'HTTP_CLIENT_IP',
			        'HTTP_FORWARDED_FOR_IP',
			        'VIA',
			        'X_FORWARDED_FOR',
			        'FORWARDED_FOR',
			        'X_FORWARDED',
			        'FORWARDED',
			        'CLIENT_IP',
			        'FORWARDED_FOR_IP',
			        'HTTP_PROXY_CONNECTION'
			);
			foreach($proxy_headers as $x){
				if (isset($_SERVER[$x])) {
					$proxy = 1;
					$proxyip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					$show_clean = true;
					break;
				}
			}
			
			// Cities to Cloak
			$cloaked_cities = array();
			if (in_array($city, $cloaked_cities)) {
				$show_clean = true;
			}
			
			// Devices to Cloak
			$allowed_devices = $this->CONFIG['allowed_devices'];
			if (!in_array($device_type, $allowed_devices)) {
				$show_clean = true;
			}


			// IP Database Connection Credentials
			$db_creds = $this->CONFIG['db_creds'];

			// Connect to mysql
			$mysqli = mysqli_connect($db_creds['host'], $db_creds['user'], $db_creds['pass'], $db_creds['database']);
			if($mysqli->connect_error) die('failed to connect');
			
			if ($mysqli) {
				// Is this user marked as a rep already?
				$result = $mysqli->query("SELECT * FROM ".$db_creds['table']." WHERE ip = ".$ip);
				if ($result) {
					if (mysqli_num_rows($result) > 0) {
						$duplicate = 1; 
						$show_clean = true;
					}
				}
			} else {
				$show_clean = true;
			}

			//Check if Cookied during collection mode
			if (isset($_COOKIE['google_23942342'])) {
				$show_clean = true;	
			}
			
			//Mark the Rep if the cloak is in collection mode
			/*
			if($this->isPageBeingCollected()) {
				$page_id = intval($this->CONFIG['page_id']);
				if ($mysqli) {
					$stmt = $mysqli->stmt_init();
					if ( $stmt->prepare("INSERT INTO " . $db_creds['table'] . " (ip, referrer, city, device_type, device_os, proxy, proxy_ip, duplicate, cloaked_page_id) VALUES (?,?,?,?,?,?,?,?,?)") ) {
						$stmt->bind_param('sssssisii', 
							$ip, 
							$referrer, 
							$city, 
							$device_type, 
							$device_os, 
							$proxy,
							$proxy_ip,
							$duplicate,
							$page_id
						);
						$stmt->execute();
					}
				}

				//Set User Cookie in Collection Mode
				setcookie("google_23942342", 1, (time() + (5*365*24*60*60)) );

				//always cloak when in collection mode!!
				$show_clean = true;
			}
			*/
			//OVERRIDES!!
			if ($this->forceClean) {
				return true; //SHOW CLEAN
			} else if ($this->whiteList) {
				return false; //SHOW DIRTY
			} else {
				return $show_clean; //NORMAL BEHAVIOR
			}
		}

	}

?>
