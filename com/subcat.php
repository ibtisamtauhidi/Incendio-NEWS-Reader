<?php
	echo "<div class='scat'>";
	function display($subcat_id,$name,$butt_val) {
		echo "<div class='scbox' id=".$subcat_id.">";		
		echo "<div class='scname>".$name."</div>";
		echo "<butt_val>".$butt_val."</butt_val>";
		echo "</isub>";
	}
	function decode_json($json_str,$uid) {
		$json_arr=json_decode($json_str,true);
		foreach($json_arr as $subcategory) {
			$cat_id=$subcategory[category_id];
			$name=$subcategory[english_subcategory_name];
			$subcat_id=$subcategory[subcategory_id];
			$result=mysql_query("SELECT * FROM subs WHERE user=".$uid." AND cat=".$cat_id." AND subcat=".$subcat_id);
				if(mysql_num_rows($result)==0) {
					$subs_do='Subscribe';
				}
				else {
					$subs_do='Unsubscribe';
				}
			display($subcat_id,$name,$subs_do);
		}
	}
	class subcat {
		var $uid,$cat;
		var $con,$url,$json_str;
		function initialize($u,$c) {
			$this->uid=$u;
			$this->cat=$c;
		}
		function connect() {
			if (($this->uid)&&($this->cat)) {
				
				//MySQL connections
				$this->con=mysql_connect('localhost','aagntgbt','kqfvywinmvda');
				if(!$this->con)
				{
					die('0');
				}
				mysql_select_db("aagntgbt_reader",$this->con);

				//JSON and variable initialize
				$this->url="http://api.feedzilla.com/v1/categories/".$this->cat."/subcategories.json?order=popular";
				$this->json_str=file_get_contents($this->url);
				}
			else
				die('0');
		}
		function finalize() {
			decode_json($this->json_str,$this->uid);
		}
		function cat() {
			echo $this->cat;
		}
	}
	$scat = new subcat();
	$scat->initialize($_GET['uid'],$_GET['cat']);
	$scat->connect();
	$scat->finalize();
?>
</sub>
<cat><? $scat->cat(); ?>
</cat>
</main>
