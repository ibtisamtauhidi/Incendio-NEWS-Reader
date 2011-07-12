<?php
;
?>
<?php 

     $app_id = '151111994941899';

     $canvas_page = 'http://apps.facebook.com/incendio/';

     $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
            . $app_id . "&redirect_uri=" . urlencode($canvas_page);

     $signed_request = $_REQUEST["signed_request"];

     list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

     $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

     if (empty($data["user_id"])) {
            echo("<script> top.location.href='" . $auth_url . "'</script>");
     } else {
    		$uid=$data["user_id"];
			$url="http://aagntgbt.facebook.joyent.us/main.php?uid=".$uid;
			$content=file_get_contents($url);
			if(!$content)
				echo "Ouch!!! Error...";
			else
				echo $content;
     } 
 ?>
