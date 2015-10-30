<?php
    /*private  $servername = '127.0.0.1';
	private	$user1 = 'bigkbear';
	private	$port = 3306;
	private	$password = "";
	private	$db_name = 'c9';*/
	
	session_start();
    
    $_SESSION['user_id']= (int)1;
    
    $db = new mysqli('127.0.0.1', 'bigkbear', '', 'c9', 3306);

?>