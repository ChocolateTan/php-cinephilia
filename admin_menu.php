
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
		function delete_menu(menu_id){
			// alert("ss");
			window.location.href="admin_menu_delete.php?menu_id="+menu_id;
		}
		function edit_menu(menu_id){
			// alert("ss");
			window.location.href="admin_menu_edit.php?menu_id="+menu_id;
		}
	</script>
</head>
<?php 
include "db/sqladapter.php";
$sqladapter = new sqladapter();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sqladapter->add_menu($_POST["menu_name"]);
}
?>
<body class="bode_admin">
	<p>
		<form  action="" method="post">
			菜单名称：<input type="textbox" name="menu_name">
			<input type="submit" name="" value="add">
		</form>
	</p>
	<p>
		<?php
		$menuList = $sqladapter->get_menu_desc();

		echo "<table border=\"1\";>";
		echo "<th>";
		echo "menu_id";
		echo "</th>";
		echo "<th>";
		echo "menu_name";
		echo "</th>";
		echo "<th>";
		echo "menu_node";
		echo "</th>";
		echo "<th>";
		echo "state";
		echo "</th>";
		echo "<th>";
		echo "";
		echo "</th>";
		echo "<th>";
		echo "";
		echo "</th>";

		foreach ($menuList as $value) {
			echo "<tr>";
			echo "<td>";
			echo $value["menu_id"];
			echo "</td>";
			echo "<td>";
			echo $value["menu_name"];
			echo "</td>";
			echo "<td>";
			echo $value["menu_node"];
			echo "</td>";
			echo "<td>";
			echo $value["state"];
			echo "</td>";
			echo "<td>";
			echo "<a href='javascript:(0);' onclick='edit_menu(".$value["menu_id"].");'>Edit</a>";
			echo "</td>";
			echo "<td>";
			echo "<a href='javascript:(0);' onclick='delete_menu(".$value["menu_id"].");'>Delete</a>";
			echo "</td>";
			echo "</tr>";
		}

		echo "</table>";
		?>
	</p>
</body>
</html>