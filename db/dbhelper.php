<?php
/**
* 
*/
header("content-type:text/html;charset=utf-8");  
class dbhelper{

	private static $host = 'localhost:3306';
	private static $username = "root";
	private static $password = "";
	private static $db_name = "db_cinephilia";
	/**  
      *通用更新方法 insert update delete 操作  
      *@param sql    
      *@return bool  true false  
      */  
	public function update($sql){  
		$link = $this->getConn();  
		mysqli_query($link, $sql);  
	        //如果出错显示  
		if(true){  
			echo mysqli_error($link);  
		}  
		$rs = mysqli_affected_rows($link);  
		$rs = $rs > 0;  
		mysqli_close($link);  
		return $rs;  
	}  

     /**  
      *通用查询方法 select 操作  
      *@param sql    
      *@return array  
      */  
     public function queryRows($sql){  
	       //创建连接，编码，数据库  
     	$link = $this->getConn();  
	       //发送sql  
     	$rs = mysqli_query($link, $sql);  
	       //如果出错显示  
     	if(true){  
     		echo mysqli_error($link);  
     	}  


     	$rows = array();  
     	while($row = mysqli_fetch_array($rs)){  
	        $rows[] = $row;//pdemo7.php  
	    }  
	       //  
	    mysqli_free_result($rs);      
	    mysqli_close($link);  
	    return $rows;  
	}  


     /**  
      *通用查询方法 select 操作  查询结果一行数据  
      *@param sql    
      *@return array   如果失败返回 false;  
      */  
     public function queryRow($sql){  
     	$rs = $this->queryRows($sql);  
     	if(!empty($rs[0])){  
     		return $rs[0];  
     	}  
     	return false;  
     }  

     /**  
      *通用查询方法 select 操作  查询结果一个数据  
      *@param sql    
      *@return array   如果失败返回 false;  
      * 例:  select count(*) from user;  
      */  
     public function queryObj($sql){  
     	$rs = $this->queryRows($sql);  
        //var_dump($rs);  
     	if(!empty($rs[0][0])){  
     		return $rs[0][0];  
     	}  
     	return false;  
     }  


     private function getConn(){  

     	$coon= mysqli_connect(self::$host, self::$username, self::$password, self::$db_name);  
     	mysqli_query($coon, "set names utf8");  
     	// mysqli_select_db(, $link);  

     	if(mysqli_connect_errno($coon)){
     		// echo "fail to connecte mysql";
     	}else{
     		// echo "success to connecte mysql";
     	}

     	return $coon;  
     }  
 }
 ?>