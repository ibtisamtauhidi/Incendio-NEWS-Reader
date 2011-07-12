<html>
<style type"text/css">
body { }
.subcat_minib { width: 205px; height: 90px; margin: 10px; margin-top: 0; background: #1a1a1a; color: #d1d8d3; }
p { margin: 10px; }
input { margin-left: 80px; }
</style>
<script type="text/javascript">
function subscribe(butt_name,cat,subcat,uid)
{
	var form_name = "s"+butt_name;	
	var rand=Math.floor(Math.random()*11);
	if (window.XMLHttpRequest)
  		{// code for IE7+, Firefox, Chrome, Opera, Safari
  			xmlhttp=new XMLHttpRequest();
  		}
	else
  		{// code for IE6, IE5
  			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  		}
	xmlhttp.open("GET","subscribe.php?cat="+cat+"&subcat="+subcat+"&rand="+rand+"&uid="+uid,false);
	xmlhttp.send();
	var response=xmlhttp.responseText;
	if(response!=0)
		{
			document.getElementById(butt_name).value=response;
		}
		else
		{
			alert("Error");
		}
}
</script>
<?Php

	//Function to display individual sub-category
	function display($cat_id,$subcat_id,$name,$subs_do,$current,$uid){
		$butt_name=$cat_id.$subcat_id.$current;
		echo "<p>".$name."<p>";
		echo "<form name='s".$butt_name."' title='subscribe'>";
		echo "<input name='".$butt_name."' id='".$butt_name."' type='button' ";
		echo "value='".$subs_do."' onClick=subscribe(".$butt_name.",".$cat_id.",".$subcat_id.",".$uid.") \></form>";
	}

	$uid=$_GET[uid];
	$cat=$_GET[cat];
	$rand=$_GET[rand];

	if($cat==NULL){
		echo "Error";
	}
	else
	{
		$con=mysql_connect('localhost','aagntgbt','kqfvywinmvda');
		if(!$con)
		{
			die('0');
		}
		mysql_select_db("aagntgbt_reader",$con);
		//JSON and variable initialize
		$url="http://api.feedzilla.com/v1/categories/".$cat."/subcategories.json?order=popular";
		$json_str=file_get_contents($url);
		$json_arr=json_decode($json_str,true);
		echo '<div id="subcat">';
		$current=0;
		foreach($json_arr as $subcategory)
		{
			if(($current%2)==0){
				$float='left';
			}
			else{
				$float='right';
			}
			echo "<div class='subcat_minib' style=\"float: ".$float.";\">";
			$cat_id=$subcategory[category_id];
			$name=$subcategory[english_subcategory_name];
			$subcat_id=$subcategory[subcategory_id];
			$result=mysql_query("SELECT * FROM subs WHERE user=".$uid." AND cat=".$cat_id." AND subcat=".$subcat_id);
			if(mysql_num_rows($result)==0)
			{
				$subs_do='Subscribe';
			}
			else
			{
				$subs_do='Unsubscribe';
			}			
			display($cat_id,$subcat_id,$name,$subs_do,$current,$uid);
			echo "</div>";
			$current=$current+1;
		}
		echo "</div>";
	}
?>
