<?php
header("cache-control:no-cache,must-revalidate"); 
//header('Content-Type:text/html; charset=gb2312');//使用gb2312编码，使中文不会变成乱码
//header('Cache-control: private, must-revalidate');
include "db/sqladapter.php";
$sqladapter = new sqladapter();
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$node = $_POST["node"];
	$title = $_POST["title"];
	$content = $_POST["content"];



	if(empty($node)){
		// echo '{"status":"0", "info":"node is null"}';
		$json_arr = array("status"=>"0","info"=>"node is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if($node == null){
		$json_arr = array("status"=>"0","info"=>"node is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	if(strlen($node)==0){
		$json_arr = array("status"=>"0","info"=>"node is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	$sqladapter->add_article($node, $title, $content);

	if($sqladapter){
		// echo '{"status":"0", "info":"success"}';
		$json_arr = array("status"=>"0","info"=>"success");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	} else {
		// echo '{"status":"0", "info":"sql err"}';
		$json_arr = array("status"=>"0","info"=>"sql err");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
}

?>