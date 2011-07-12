<html>
<head>
<style type="text/css">
body {margin: 0; padding: 0; background: #dee083; }
#cat_list { width: 200px; float: left; height: 499px; overflow-y: scroll; scrollbar-arrow-color: blue; scrollbar-face-color: #e7e7e7; scrollbar-3dlight-color: #a0a0a0; }
#subcat_display { float: left; height: 500px;}
p {margin-left: 15px; }
#channel { width: 730px; padding: 0; }
.cat_minib {  font-family: Verdana, Arial, sans; font-size: 1.1em; height: 45px; padding-top: 3px; padding-left: 5px; margin-top: 3px; margin-bottom: 3px; margin-right: 0; background: #990000; color: #d1d8de; }
iframe { border: 0px solid; }
#select { color: #246378; background: #1a1a1a; margin-left: 100px; padding: 30px; }
#prep { color: #246378; background: #1a1a1a; margin: 10px; padding: 20px; margin-top: 15px; }
</style>

</head>


<body>
<script type="text/javascript">
<?php
$uid=$_GET[uid];
echo "var uid=".$uid.";";
?>
function mouseover(id)
{
document.getElementById(id).style.backgroundColor='#1a1a1a';
}
function mouseout(id)
{
document.getElementById(id).style.backgroundColor='#990000';
} 
function load_subcat(cat,uid)
{
	var rand=Math.floor(Math.random()*11);
	str="<iframe src='subcat.php?cat="+cat+"&rand="+rand+"&uid="+uid+"' height='496px' width='530px' border='0'></iframe>";
	document.getElementById('subcat_display').innerHTML=str;
}
</script>
<div id="channel">
<?php
	echo "<div id='cat_list'>";
	echo "<p id='prep'>Preparing List. Please wait... </p>";
	echo "</div>";
	echo "<div id='subcat_display' class='subcat_display'>";
	echo "<p id='select'>Please select a category from the right.</p>";
	echo "</div>";
?>
</div>
<script type="text/javascript">
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	var url="cat.php?uid="+uid;
	xmlhttp.open("GET",url,false);
	xmlhttp.send();
	var cat_r=xmlhttp.responseText;
	document.getElementById('cat_list').innerHTML=cat_r;
</script></body></html>
