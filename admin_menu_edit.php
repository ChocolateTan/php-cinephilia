
<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Cinephilia迷影</title>
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

	<script type="text/javascript" src="public/js/jquery.min.js"></script>
	<script type="text/javascript">
	</script>
</head>
<?php 
include "db/sqladapter.php";
$sqladapter = new sqladapter();
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$sqladapter->update_menu($_POST["menu_id"], $_POST["menu_name"], $_POST["menu_node"]);
}
?>
<body class="bode_admin">
	<p>
		<form  action="" method="post">
			<?php
			$menuList = $sqladapter->get_menu_by_id($_GET['menu_id']);

			echo "<table border=\"1\";>";
			echo "<th>";
			echo "menu_id";
			echo "</th>";
			echo "<th>";
			echo "菜单名称";
			echo "</th>";
			echo "<th>";
			echo "节点";
			echo "</th>";
			echo "<th>";
			echo "";
			echo "</th>";

			foreach ($menuList as $value) {
				echo "<tr>";
				echo "<td>";
				echo $value["menu_id"];
				echo "<input type='hidden' name='menu_id'  value=".$value["menu_id"].">";
				echo "</td>";
				echo "<td>";
				echo "<input type='textbox' name='menu_name'  value=".$value["menu_name"].">";
				echo "</td>";
				echo "<td>";
				echo "<input type='textbox' name='menu_node'  value=".$value["menu_node"].">";
				echo "</td>";
				echo "<td>";
				echo "<input type='submit'  value='save'>";
				echo "</td>";
				echo "</tr>";
			}

			echo "</table>";
			?>

		</form>
	</p>
</body>
</html>