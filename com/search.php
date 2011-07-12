<?php
	//	This script loads the json string from feedzilla and returns it. On error it returns 0.
	//	This is to enable AJAX on client side js. Since AJAX-calls are only possible within same server.
	$str=$_GET[str];
	if(!$str){
		die('0');
	}
	else
	{
		$url="http://api.feedzilla.com/v1/articles/search.json?count=20&order=date&q=".$str;
		$json_str=file_get_contents($url);
		if ($json_str)
			echo $json_str;
		else
			die('0');
	}	
?>
