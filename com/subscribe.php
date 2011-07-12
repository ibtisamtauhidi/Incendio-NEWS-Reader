<?php

//This file is used to make changes in the subscribtion database. The file returns 'Subscribe' (on successful unsubscribtion), 'Unsubscribe' and 0

	class subscribe {
		var $uid=NULL;
		var $cat=NULL;
		var $subcat=NULL;
		function initialize($u,$c,$s) {
			$this->uid=$u;
			$this->cat=$c;
			$this->subcat=$s;
		}
		function model() {
			$con=mysql_connect('localhost','aagntgbt','kqfvywinmvda');
			if(!$con) {
				return "0";
			}
			mysql_select_db("aagntgbt_reader",$con);
			$result=mysql_query("SELECT * FROM subs WHERE user=".$this->uid." AND cat=".$this->cat." AND subcat=".$this->subcat);
			$row=mysql_fetch_array($result);
			if(!$row['user']){
				if(mysql_query("INSERT INTO subs (user,cat,subcat) VALUES (".$this->uid.",".$this->cat.",".$this->subcat.")"))
				{
					//Subscribed and ask to unsubscribe
					return "Unsubscribe";
				}
				else
				{
					return "0";
				}
			}
			else {
				if(mysql_query("DELETE FROM subs WHERE user=".$this->uid." AND cat=".$this->cat." AND subcat=".$this->subcat)) {
					return "Subscribe";
				} else {
					return "0";
				}
			}
		}
	}
	$subs = new subscribe();
	if(($_GET[uid]!=NULL)&&($_GET[cat]!=NULL)&&($_GET[subcat]!=NULL)) {
		$subs->initialize($_GET[uid],$_GET[cat],$_GET[subcat]);
		$response=$subs->model();
	} else {
		$response="0";
	}
	if($response!="0")
		echo $response;
	else
		echo "0";
?>
