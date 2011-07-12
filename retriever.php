<?Php
	$subcat=$_GET[subcat];
	$cat=$_GET[cat];
	if(($subcat==NULL)||($cat==NULL)){
		echo "0";
	}
	else
	{
		$url="http://api.feedzilla.com/v1/categories/".$cat."/subcategories/".$subcat."/articles.json";
		$json_str=file_get_contents($url);
		$json_arr=json_decode($json_str,true);
		$current=0;
		foreach($json_arr[articles] as $article)
		{
			if($current<10)
			{
				$author=chop($article[author],"<br />");
				$date=$article[publish_date];
				$source=$article[source];
				$summary=$article[summary];
				$title=$article[title];
				$article_url=$article[url];
				$source_url=$article[source_url];
				$minides=chunk_split($summary,70);
				$furl0="http://www.facebook.com/dialog/feed?app_id=151111994941899";
				$furl1="&redirect_uri=http://apps.facebook.com/incendio/shared.php";
				$furl2="&link=".$article_url."&name=".$title."&caption="."on Incendio NEWS Reader via ".$source;
				$furl3="&description=".$minides;
				echo "<div class='art_minib'>";
				echo "<h2><a href=\"".$article_url."\">".$title."</a></h2><h3>";
				if($author){
					echo "<em>".$author."</em> ";
				}
				echo "via <a href=\"".$source_url."\">".$source."</a> on ".$date."</h3><p>";
				echo $summary."</p>";
				echo "<a href=\"".$article_url."\" target='_blank' ><img src='./src/read.png' alt='click to read more' /></a>";
				echo "<a href='".$furl0.$furl1.$furl2.$furl3."' target='_blank'>";
				echo "<img src='./src/share.png' alt='click to share' /></a>";
				echo "</div>";
			}
			$current=$current+1;
		}
	}	
?>