<?php

class Database{
    //Define all the needed database properties
    private static $_instance;//use the variable with out instanctiating the class
    private $servername = '127.0.0.1';
	public $user1 = 'bigkbear';
	private $port = 3306;
	private $password = "";
	private $conn;
	private $mysqli;
	private $db_name = "c9";
	
	
    function getLerntDetails($conn){
        $detail_stmt = false;
        
        if(isset($conn)){
            $details_sql = 'SELECT * FROM lerntdetails';
            
            $detail_stmt = $conn->prepare($details_sql);
            $detail_stmt -> execute();
            
            $details_result = $detail_stmt->setFetchMode(PDO::FETCH_ASSOC);
        }
        
        if($detail_stmt)
            return $detail_stmt;
        else
            return null;
    }

//TODO: USER daTABASE SO PPL CAN track WHAT THEY LEARNED (journal)

//TODO: Learning planner

//TODO: TAG FRIENDS USINFG disply name
?>