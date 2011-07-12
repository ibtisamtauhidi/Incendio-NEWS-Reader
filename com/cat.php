<div id='cat_list'>
<?Php

	//Displays a list of all available categories. Each cat name is in a div of class 'cbox' and onClick='loadSubCat(this.id)'

	class cat {
		var $url='http://api.feedzilla.com/v1/categories.json';
		var $json_str,$json_arr,$cat_id,$name,$category;
		function get_list() {
				$this->json_str=file_get_contents($this->url);
				$this->json_arr=json_decode($this->json_str,true);
		}
		function display() {
			foreach($this->json_arr as $this->category){
				$this->cat_id=$this->category[category_id];
				$this->name=$this->category[english_category_name];
				echo "<div class='cbox' id='".$this->cat_id."' onClick='loadSubCat(this.id)'>".$this->name."</div>";
			}
		}
	}
	$cat_l = new cat();
	$cat_l->get_list();
	$cat_l->display();
?>
</div>
