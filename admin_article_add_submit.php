<?php
header("cache-control:no-cache,must-revalidate"); 
//header('Content-Type:text/html; charset=gb2312');//使用gb2312编码，使中文不会变成乱码
//header('Cache-control: private, must-revalidate');
include "db/sqladapter.php";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sqladapter = new sqladapter();
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

	if(!is_dir("images")){     // is_dir()函数判断指定的文件夹是否存在
	    mkdir("images");         // mkdir()函数创建文件夹
	}
	
	$file=$_FILES['file'];   // 获取上传文件
	if(is_uploaded_file($file['tmp_name'])){   // 判断上传是不是通过HTTP POST上传的
	    $str=stristr($file['name'],'.');         // stristr()函数获取上传文件的后缀
	    // strtotime()函数定义一个Unix时间戳
	    $path="images/".strtotime("now").$str;   // 定义上传文件的存储位置
	    if(move_uploaded_file($file['tmp_name'],$path)){   // 执行文件上传操作
	    	$json_arr = array("status"=>1,"info"=>"上传成功，文件名称为：".strtotime("now").$str);
	    	$json_obj = json_encode($json_arr);
	    	echo $json_obj;
	    	return;
	    }else{
			$json_arr = array("status"=>1,"info"=>"move_uploaded_file is null");
			$json_obj = json_encode($json_arr);
			echo $json_obj;
			return;
	    }
	}else{
		$json_arr = array("status"=>1,"info"=>"tmp_name is null");
		$json_obj = json_encode($json_arr);
		echo $json_obj;
		return;
	}
	$sqladapter->add_article($node, $title, $content);

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