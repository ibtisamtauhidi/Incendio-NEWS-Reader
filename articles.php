<html>
<meta http-equiv="expires" value="Thu, 16 Mar 2000 11:00:00 GMT" />
<meta http-equiv="pragma" content="no-cache" />
<head>
<style type="text/css">
#art_dis { width: 690px; }
.art_minib { padding: 10px; font-family: Verdana, Arial, Sans; border: 0px solid; margin: 6px; background: #1a1a1a}
h2 { font-style: none; font-size: 1.2em; margin-bottom: 5px; color: #990000}
h3 { font-style: none; font-size: 0.7em; font-weight: none; color: #dee083; }
p { width: 500px; text-align:justify; color: #d1d8de; }
a:link { text-decoration: none; color: #990000}
a:visited { text-decoration: none; color: #990000}
a:hover { text-decoration: none; color: #246378}
a:active { text-decoration: none; color: #990000}
img { border: 0; margin: 15px; }
iframe { border: 0px;}
#nosub {background: #1a1a1a; color: #990000; max-width: 550px; margin-left: 70px; padding: 20px; font-family: Verdana, Arial, sans; font-size: 1.2em;}
#fig {color: #d1d8de; }
</style>
</head>
<body>
<script type="text/javascript">
function loader(num)
{
	next=num+1;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			id="art"+num;				
			var response=xmlhttp.responseText;
			document.getElementById(id).innerHTML=response;
			if(next<total)
			{
				loader(next);
			}									
		}
	}
	xmlhttp.open("GET","retriever.php?cat="+cat_arr[num]+"&subcat="+scat_arr[num],true);
	xmlhttp.send();
}		
	cat_arr=new Array();
	scat_arr=new Array();
	var error=0;	
<?php	
		$uid=$_GET[uid];
		//mySQL connection
		$con=mysql_connect('localhost','aagntgbt','kqfvywinmvda');
		if(!$con)
		{
			die(mysql_error());
		}
		mysql_select_db("aagntgbt_reader",$con);
		$result=mysql_query("SELECT * FROM subs WHERE user=".$uid);
		if(mysql_num_rows($result)==0)
		{
			echo "var error=1;";
		}
		else
		{
			$i=0;
			while($row=mysql_fetch_array($result))
			{
			echo "cat_arr[".$i."]=".$row['cat'].";\n";
			echo "scat_arr[".$i."]=".$row['subcat'].";\n";
			$i=$i+1;
			}
			echo "var total=".$i.";\n";
		}				
	?>

</script>
<div id="art_dis" name="art_dis">
<p></p>
<?php
	if($i!=0)
	{
		$j=0;
		while($j!=$i)
		{
			echo "<div id='art".$j."'>";
			echo "</div>";
			$j=$j+1;
		}
	}
?>
</div>
<script type="text/javascript">
	if(error==1)
	{
		document.getElementById('art_dis').innerHTML="<p id='nosub'>You seem to be new here. Please subscribe to some channels first. We have <span id='fig'>250000+</span> news sources spanning over <span id='fig'>2500</span> sub - categories. Your custom daily newspaper has finally arrived.</p>";
	}
	else
	{
		if(total!=0)
		{
			loader(0);
		}
	}
</script>
</body></html>
