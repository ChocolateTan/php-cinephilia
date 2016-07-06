<?php
include "dbhelper.php";
class sqladapter{

	public function get_menu(){
		
		$dbconn = new dbhelper();
		$sql = "SELECT * FROM db_cinephilia.tb_menu WHERE delete_or_not = false;";
		return $dbconn->queryRows($sql);
	}

	public function get_menu_by_id($menu_id){
		
		$dbconn = new dbhelper();
		$sql = "SELECT * FROM db_cinephilia.tb_menu WHERE delete_or_not = false and menu_id='".$menu_id."';";
		return $dbconn->queryRows($sql);
	}
	
	public function get_menu_desc(){
		
		$dbconn = new dbhelper();
		$sql = "SELECT * FROM db_cinephilia.tb_menu WHERE delete_or_not = false ORDER BY menu_id DESC;";
		return $dbconn->queryRows($sql);
	}

	public function add_menu($menu_name){
		$dbconn = new dbhelper();
		$sql = "INSERT INTO tb_menu (menu_name, menu_node) VALUES ('".$menu_name."', '0');";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		// echo $sql;
		return $dbconn->update($sql);
	}

	public function update_menu_to_delete($menu_id){
		$dbconn = new dbhelper();
		$sql = "UPDATE tb_menu SET delete_or_not = true WHERE menu_id='".$menu_id."'";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		// echo $sql;
		return $dbconn->update($sql);
	}

	public function update_menu($menu_id, $menu_name, $menu_node){
		$dbconn = new dbhelper();
		$sql = "UPDATE tb_menu SET menu_name = '".$menu_name."' , menu_node = '".$menu_node."' WHERE menu_id='".$menu_id."'";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		 // echo $sql;
		return $dbconn->update($sql);
	}

	public function add_article($node_id, $title, $content){
		$dbconn = new dbhelper();
		$sql = "INSERT INTO tb_article (node_id, title, content)VALUES ('".$node_id."', '".$title."','".$content."');";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		 // echo $sql;
		return $dbconn->update($sql);
	}

	public function get_article(){
		$dbconn = new dbhelper();
		$sql = "SELECT * FROM `tb_article` WHERE delete_or_not = false ORDER BY create_date DESC;";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		 // echo $sql;
		return $dbconn->queryRows($sql);
	}
	public function get_article_by_id($id){
		$dbconn = new dbhelper();
		$sql = "SELECT * FROM `tb_article` WHERE delete_or_not = false and article_id ='".$id."' ORDER BY create_date DESC;";
		//"INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin', '35')"
		 // echo $sql;
		return $dbconn->queryRow($sql);
	}
}
?>