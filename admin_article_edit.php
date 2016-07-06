
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
		function submit_article(){
			// var editor = new UE.ui.Editor();
			var article_node=$('#node').val();
			var article_title=$('#title').val();
			var article_content=UE.getEditor('container').getContent()

			// alert('1:'+article_node);
			// alert('2:'+article_title);
			// alert('3:'+article_content);
			$.ajax({ //一个Ajax过程
				type: "post", //以post方式与后台沟通
			    url : "admin_article_add_post.php", //与此php页面沟通
			    dataType:'json',//从php返回的值以 JSON方式 解释
			    data: 
			    {node:article_node,title:article_title,content:article_content}, 
			    //发给php的数据有两项，分别是上面传来的u和p
			    success: function(data){//如果调用php成功
			    	if(data.status == 0){
			    		alert(data.info);
			    	}else{
			    		alert(data.info);
			    	}
			    },
			    error: function(){  
			    	alert('Error loading');  
			    }
			});
		}
	</script>
</head> 

<?php 
include "db/sqladapter.php";
$sqladapter = new sqladapter();
?>
<body class="bode_admin">
	<?php
	$articleList = $sqladapter->get_article_by_id($_GET['article_id']);

	//echo "<p>编号：<input type='text' id='node' value='".$articleList['article_id']."'></p>";
	echo "<p>标题：<input type='text' id='node' value='".$articleList['title']."'></p>";
	echo "<p>分类：<input type='text' id='node' value='".$articleList['node_id']."'></p>";
	echo "<p>";
		// <!-- 加载编辑器的容器 -->
		// <!-- 以下脚本中增加文本为初始化内容 -->
	echo "<script id='container' type='text/plain' style='width:100%;height:500px;'>";

	echo "</script>";
		// <!-- 配置文件 -->
	echo "<script type='text/javascript' src='public/ueditor/ueditor.config.js'></script>";
		// <!-- 编辑器源码文件 -->
	echo "<script type='text/javascript' src='public/ueditor/ueditor.all.js'></script>";
		// <!-- 实例化编辑器 -->
	echo "<script type='text/javascript'>";
	echo "var ue = UE.getEditor('container');";
	echo "ue.addListener('ready', function () {ue.setContent('".$articleList['content']."');});";
	// echo "ue.setContent('".$articleList['content']."');";
	echo "</script>";
	echo "</p>";
	echo "<p>";
	echo "<input type='button' name='save' onclick='submit_article();' value='save' />";
	echo "</p>";
	?>
</body>
</html>