<?php
include "db/sqladapter.php";
$sqladapter = new sqladapter();
$sqladapter->update_menu_to_delete($_GET['menu_id']);

$url = "admin_menu.php";  
header ("location:".$url);

?>