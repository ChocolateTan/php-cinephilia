<?php
include "db/sqladapter.php";
$sqladapter = new sqladapter();
$sqladapter->update_article_to_delete($_GET['article_id']);

$url = "admin_article.php";  
header ("location:".$url);

?>