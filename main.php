<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>  
	<meta content="text/html; charset=ISO-8859-1" http-equiv="content-type">
	<title>Incendio NEWS Reader</title>
	<script type="text/javascript">
	<?php
		$uid=$_GET[uid];
		echo "var uid=".$uid.";";
		?>
function mouseover(id)
{
document.getElementById(id).style.backgroundColor='#990000';
}
function mouseout(id)
{
document.getElementById(id).style.backgroundColor='#1a1a1a';
} 
		function loadreader()
		{
			var rand=Math.floor(Math.random()*11);
			document.getElementById('main_display').innerHTML="<iframe src='articles.php?uid="+uid+"&rand="+rand+"' border='0px' width='730px' height='498px'><p>Your browser does not support iframe</p></iframe>";
		}
		function loadchannels()
		{
			document.getElementById('main_display').innerHTML="<iframe src='channels.php?uid="+uid+"' border='0px' width='730px' height='500px'><p>Your browser does not support iframe</p></iframe>";
		}
		function loadabout()
		{
			document.getElementById('main_display').innerHTML="<iframe src='about.php?uid="+uid+"' border='0px' width='730px' height='500px'><p>Your browser does not support iframe</p></iframe>";
		}
	</script>
	<style type="text/css">
		body { width: 730px; background: #246378; padding: 0; }
		#header { height: 140px; color: #d1d8de}
		#nav { width: 730px; background: black; }
		.nav_b { background: #1a1a1a; height: 30px; width: 120px; text-align: center; margin-right: 2px; float: left; padding-top: 5px; color: #d1d8de; cursor: default; }
		#main_display { height: 500px; width: 730px; background: #dee083; margin-top: 35px;}
		#logo { float: left; margin-left: 25px;}
		#name { float: left; font-size: 2em; font-family= Georgia, Verdana, sans; margin-top: 45px; margin-left: 30px; }
		sup {font-size: 0.5em;}
		iframe {border: 0px solid; background: #dee083;}
		#slo { color: #1a1a1a; margin-top: 0px; margin-left: 170px; font-size: 20px; }
	</style>
 
</head>
<body onload="loadreader()">
<div class="main">
	<div id="header"><div id="logo"><img src="./src/newspaper.png" /></div><div id='name'>Incendio NEWS Reader <sup>Beta 1.0</sup><p id='slo'>your custom news portal</p></div></div>
	<div id="nav">
		<div class="nav_b" id="reader" onmouseover='mouseover(this.id)' onmouseout='mouseout(this.id)' onClick="loadreader()">Front Screen</div>
		<div class="nav_b" id="channels" onmouseover='mouseover(this.id)' onmouseout='mouseout(this.id)' onClick="loadchannels()">Subscriptions</div>
		<div class="nav_b" id="about" onmouseover='mouseover(this.id)' onmouseout='mouseout(this.id)' onClick="loadabout()">About</div>
	</div>
	<div id="main_display"> </div>
</div>
</body>
</html>
