<?Php
	$uid=$_GET[uid];
	$cat=$_GET[cat];
	$subcat=$_GET[subcat];
	if(($uid==NULL)||($cat==NULL)||($subcat==NULL))
	{
		die('0');
	}
	else
	{
		$con=mysql_connect('localhost','aagntgbt','kqfvywinmvda');
		if(!$con)
		{
			die('0');
		}
		mysql_select_db("aagntgbt_reader",$con);
		$result=mysql_query("SELECT * FROM subs WHERE user=".$uid." AND cat=".$cat." AND subcat=".$subcat);
		$row=mysql_fetch_array($result);
		if(!$row['user']){
			if(mysql_query("INSERT INTO subs (user,cat,subcat) VALUES (".$uid.",".$cat.",".$subcat.")"))
			{
				//Subscribed
				echo "Unsubscribe";
			}
			else
			{
				die('0');
			}
		}
		else{
			if(mysql_query("DELETE FROM subs WHERE user=".$uid." AND cat=".$cat." AND subcat=".$subcat))
			{
				echo "Subscribe";
			}
			else
			{
				die('0');
			}
		}
	}
?>
