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
				type: "POST", //以post方式与后台沟通
			    url : "admin_article_add_submit.php", //与此php页面沟通
			    dataType:"json",//从php返回的值以 JSON方式 解释
			    data: 
			    {node:article_node,title:article_title,content:article_content}, 
			    //发给php的数据有两项，分别是上面传来的u和p
			    success: function(data){//如果调用php成功
			    	if(data.status == 1){
			    		alert(data.info);
			    	}else{
			    		alert(data.info);
			    	}
			    },
			    error: function(XMLHttpRequest, textStatus, errorThrown) {
			    	alert(XMLHttpRequest.status);
			    	alert(XMLHttpRequest.readyState);
			    	alert(textStatus);
			    }})
		}
	</script>
</head> 

<body class="bode_admin">
	<p id="p_result"></p>
	<!-- <form action="" method="post"> -->
	<p>标题：<input type="text" id="title"></p>
	<p>分类：<input type="text" id="node"></p>
	<p>
		<!-- 加载编辑器的容器 -->
		<!-- 以下脚本中增加文本为初始化内容 -->
		<script id="container" type="text/plain" style="width:100%;height:500px;">

		</script>
		<!-- 配置文件 -->
		<script type="text/javascript" src="public/ueditor/ueditor.config.js"></script>
		<!-- 编辑器源码文件 -->
		<script type="text/javascript" src="public/ueditor/ueditor.all.js"></script>
		<!-- 实例化编辑器 -->
		<script type="text/javascript">
			var ue = UE.getEditor('container');
		</script>
	</p>
	<p>
		<input type="button" name="save" onclick="submit_article();" value="save" />
	</p>
	<!-- </form> -->
</body>
</html>