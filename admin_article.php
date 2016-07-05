
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
		function go_to_add(){
			location.href="admin_article_add.php";
		}
	</script>
</head>
<?php 
include "db/sqladapter.php";
$sqladapter = new sqladapter();
?>

<body class="bode_admin">
	<p>
		<input type="submit" name="" value="add" onclick="go_to_add();">
	</p>
	<p>
		<?php
		echo "<table border=\"1\";>";
		echo "<th>";
		echo "文章编号";
		echo "</th>";
		echo "<th>";
		echo "分类";
		echo "</th>";
		echo "<th>";
		echo "文章标题";
		echo "</th>";
		echo "<th>";
		echo "创建时间";
		echo "</th>";
		echo "<th>";
		echo "修改时间";
		echo "</th>";
<<<<<<< HEAD
		echo "<th>";
		echo "";
		echo "</th>";
		echo "<th>";
		echo "";
		echo "</th>";
=======
>>>>>>> eb06b3ee32b7f98a02557854459c997ab5f0fa4e

		$list = $sqladapter->get_article();

		foreach ($list as $value) {
			echo "<tr>";
			echo "<td>";
			echo $value["article_id"];
			// echo "<input type='hidden' name='menu_id'  value=".$value["menu_id"].">";
			echo "</td>";
			echo "<td>";
			echo $value["node_id"];
			// echo "<input type='textbox' name='menu_name'  value=".$value["menu_name"].">";
			echo "</td>";
			echo "<td>";
			echo $value["title"];
			// echo "<input type='textbox' name='menu_node'  value=".$value["menu_node"].">";
			echo "</td>";
			echo "<td>";
			echo $value["create_date"];
			echo "</td>";
			echo "<td>";
			echo $value["modify_date"];
			echo "</td>";
<<<<<<< HEAD
			echo "<td>";
			echo "<a href='javascript:(0);' onclick='edit_menu(".$value["article_id"].");'>Edit</a>";
			echo "</td>";
			echo "<td>";
			echo "<a href='javascript:(0);' onclick='delete_article(".$value["article_id"].");'>Delete</a>";
			echo "</td>";
=======
>>>>>>> eb06b3ee32b7f98a02557854459c997ab5f0fa4e
			echo "</tr>";
		}

		echo "</table>";
		?></p>
	</body>
	</html>