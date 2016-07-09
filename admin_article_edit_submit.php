<?php
header("cache-control:no-cache,must-revalidate"); 
include "db/sqladapter.php";
// echo $_SERVER["REQUEST_METHOD"];
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$sqladapter = new sqladapter();
	$id = $_POST["id"];
	$node = $_POST["node"];
	$title = $_POST["title"];
	$content = $_POST["content"];

	$sqladapter->update_article($id, $node, $title, $content);

	if($sqladapter){
		// echo '{"status":"0", "info":"success"}';
		$json_arr = array("status"=>1,"info"=>"success");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	} else {
		// echo '{"status":"0", "info":"sql err"}';
		$json_arr = array("status"=>0,"info"=>"sql err");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
}
?>