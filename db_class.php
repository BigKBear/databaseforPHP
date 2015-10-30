<?php
//include 'db_connection.php';


class Database{
    //Define all the needed database properties
    private static $_instance;//use the variable with out instanctiating the class
    private $conn;
	private $mysqli;
	
	private  $servername = '127.0.0.1';
	private	$user1 = 'bigkbear';
	private	$port = 3306;
	private	$password = "";
	private	$db_name = 'c9';
	
	//ensuring the Singleton class
	static function getInstance(){
	    /*Creates an instance of this object if none exists and returns it.*/
    	if(self::$_instance === null)
    	{
    	    self::$_instance = new Database();
    	}
    	    return self::$_instance;
    	
	}

    //Defining all the Actions
    private function __construct(){
        try {
            //$conn->getInstance();
    	    //$conn = new PDO("mysql:host={self::$servername};dbname={self::$db_name", self::$user, self::$password);
    	    // set the PDO error mode to exception
    	    
    	    $this->mysqli = new mysqli('127.0.0.1', 'bigkbear', '', 'c9', 3306);
    	    //http://www.w3schools.com/php/php_mysql_update.asp
    	    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) 
        {
        	printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
    }
    
    private function __clone(){
        
    }
    
    function __destruct(){
        echo '<br>Closing database: ', $this->db_name;
        /* close connection */
        
        $this->mysqli->close();
    }
  
    //alows the creation of a new skill
    public function createSkill($skill_being_added){
        $sql = "INSERT INTO skills (description)
            VALUES ($skill_being_added)";
            
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
        //$conn->close();
    }
   
   //returns all skills to be displayed in pagination
   public function qry($sql){
       /*$skill_stmt = false;
       
        if(isset($conn)){
            $skills_sql = 'SELECT * FROM skills';
            
            $skil_stmt = $conn->prepare($skills_sql);
            $skill_stmt -> execute();
            
            $skills_result = $skill_stmt->fetch_assoc();
        }
        
        if($skills_result){
            return $skills_result;
            var_dump($skills_result);
        }
        else if (cond2) {
            return null;
        }else if (cond3) {
            return null;
        }else if (cond4) {
            return null;
        } else {
        }*/
    
    if ($result = $this->mysqli->query($sql)) 
    {
        /* fetch associative array 
        while ($row = $result->fetch_assoc()) 
        {
            printf ("%s -> %s -> %d -> %d\n", $row["skill_id"], $row["description"], $row["t_up"], $row["t_down"]);
        }*/
        
        $assoc = $result->fetch_all(MYSQLI_ASSOC);
        /* free result set */
        $result->free();
        return $assoc;
    }
   }
   
   //read a single user set of skill(s)
   public function getUserSkills($user_id){
       $sql = 'Select * FROM skills INNER JOIN user ON users_id = :user_id AND user.displayname = skills.name';
       
       $stmt = $conn->prepare($sql);
       $stmt->execute();
       
   }
   
   /*TODO: Read a set of skills for aparticulat date of time
   EXAMPLE: start of september till end of September
   */
   public function getSkillsByDate($start_date,$end_date){
       
   }
   
   public function updateSingleUserSkill($current_user,$new_skill){
       $sql = "UPDATE user_skils SET skill_id=$new_skill WHERE us_id=$current_user";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }
        
        $conn->close();
   }
   
   public function deleteSingleUserSkill(){
       
   }
}
?>