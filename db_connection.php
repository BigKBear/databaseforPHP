<?php
/*
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
*/
	//Define all the needed database properties
    // private static $_instance = null;//use the variable without instantiating the class
class DBconnect{    
	private  $servername = '127.0.0.1';
	private	$user1 = 'bigkbear';
	private	$port = 3306;
	private	$password = "";
	private	$db_name = 'c9';
  
	/*try {
		$this->mysqli = new mysqli('127.0.0.1', 'bigkbear', '', 'c9', 3306);
	    //The below PDO statment currently does not work on Cloud 9
	    //$this ->$conn = new PDO("mysql:host='127.0.0.1';dbname='c9'", 'bigkbear', ''");
	    
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }*/
}
?>
