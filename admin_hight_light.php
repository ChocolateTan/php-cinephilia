
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript">
		
	</script>
</head>
<?php 
include "db/sqladapter.php";
$sqladapter = new sqladapter();
?>

<body class="bode_admin">
	<p>
		<form  action="" method="post">
			<p>文章图片：<input type="file" name="menu_file"></p>
			<p>文章序号：<input type="textbox" name="menu_index"></p>
			<p>文章连接：<input type="textbox" name="menu_name"></p>
			<input type="submit" name="" value="add">
		</form>
	</p>
	<p>
		<?php
		echo "<table border=\"1\";>";
		echo "<th>";
		echo "序号";
		echo "</th>";
		echo "<th>";
		echo "图片";
		echo "</th>";
		echo "<th>";
		echo "文章连接";
		echo "</th>";
		echo "<th>";
		echo "";
		echo "</th>";

			// foreach ($menuList as $value) {
			// 	echo "<tr>";
			// 	echo "<td>";
			// 	echo $value["menu_id"];
			// 	// echo "<input type='hidden' name='menu_id'  value=".$value["menu_id"].">";
			// 	echo "</td>";
			// 	echo "<td>";
			// 	// echo "<input type='textbox' name='menu_name'  value=".$value["menu_name"].">";
			// 	echo "</td>";
			// 	echo "<td>";
			// 	// echo "<input type='textbox' name='menu_node'  value=".$value["menu_node"].">";
			// 	echo "</td>";
			// 	echo "<td>";
			// 	echo "<input type='submit'  value='save'>";
			// 	echo "</td>";
			// 	echo "</tr>";
			// }

		echo "</table>";
		?></p>
	</body>
	</html>