<?php
	function display($cat_id,$name){
		echo $name;
	}
	$uid=$_GET[uid];
	$url='http://api.feedzilla.com/v1/categories.json';
	$json_str=file_get_contents($url);
	$json_arr=json_decode($json_str,true);
		echo '<div id="cat">';
	$current=0;
	foreach($json_arr as $category){
		$cat_id=$category[category_id];
		echo "<div class='cat_minib' id=cminib".$cat_id." onmouseover='mouseover(this.id)' onmouseout='mouseout(this.id)' onClick='load_subcat(".$cat_id.",".$uid.")'>";
		$name=$category[english_category_name];
		display($cat_id,$name);
		echo "</div>";
		$current=$current+1;
	}
	echo "</div>";
?>