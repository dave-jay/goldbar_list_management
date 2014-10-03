<?php

/**
 * @author Dave Jay <dave.jay90@gmail.com>
 * @version 1.0
 * @package goldbar_list_management
 * 
 */
$allowed = array('png', 'jpg', 'gif','zip');

if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

	$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

	if(!in_array(strtolower($extension), $allowed)){
		echo '{"status":"error"}';
		exit;
	}

	if(move_uploaded_file($_FILES['upl']['tmp_name'],_PATH .'uploads/'.$_FILES['upl']['name'])){
		echo '{"status":"success"}';
		exit;
	}
        die;
}







$jsInclude = "list.js.php";
_cg("page_title", "Goldbar List");
?>