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

	if($node == null){
		$json_arr = array("status"=>0,"info"=>"node is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if(strlen($node)==0){
		$json_arr = array("status"=>0,"info"=>"node is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}

	if(empty($title)){
		// echo '{"status":"0", "info":"node is null"}';
		$json_arr = array("status"=>0,"info"=>"title is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if($title == null){
		$json_arr = array("status"=>0,"info"=>"title is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if(strlen($title)==0){
		$json_arr = array("status"=>0,"info"=>"title is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if(empty($content)){
		// echo '{"status":"0", "info":"node is null"}';
		$json_arr = array("status"=>0,"info"=>"content is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if($content == null){
		$json_arr = array("status"=>0,"info"=>"content is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if(strlen($content)==0){
		$json_arr = array("status"=>0,"info"=>"content is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}

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