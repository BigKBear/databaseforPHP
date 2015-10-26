<?php
/*
	ini_set('display_errors',1);
	ini_set('display_startup_errors',1);
	error_reporting(-1);
*/

	$hostname = "192.168.56.1";
	$port = 3306;
	$user = "bigkbear";
	$password = "";
	$db = "c9";
  
	try {
	    $this ->$conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
    	echo "Connection failed: " . $e->getMessage();
    }
?>

<!--
<?php
/*
Create a database connection using PDO or use MYSQLi if PDO is not avaiable

Wrap it in aclass whihc implments the singleton Design Pattern
*/

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
	
	//ensuring the Singlaton class
	static function getInstance(){
    	if(!self::$_instance){
    	    $_instance = new self();
    	}else{
    	    return self::$_instance;
    	}
	}

    //Defining all the Actions
   function __construct(){
        try {
            //$conn->getInstance();
    	    //$conn = new PDO("mysql:host={self::$servername};dbname={self::$db_name", self::$user, self::$password);
    	    // set the PDO error mode to exception
    	    
    	    self::$mysqli = new mysqli('127.0.0.1', 'dariothornhill1', '', 'c9', 3306);
    	    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
        	printf("Connect failed: %s\n", $mysqli->connect_error);
            exit();
        }
    }
    
    function __destruct(){
        echo 'Closing database: ', $this->db_name;
        /* close connection */
        
        $mysqli->close();
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
    
    if ($result = $mysqli->query($sql)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s -> %s -> %d -> %d\n", $row["skill_id"], $row["description"], $row["t_up"], $row["t_down"]);
    }

    /* free result set */
    $result->free();
}
   }
   
   //read a single user set of skill(s)
   public function getUserSkills(){
       
   }
   
   /*TODO: Read a set of skills for aparticulat date of time
   EXAMPLE: start of september till end of September
   */
   public function getSkillsByDate(){
       
   }
   
   public function updateSingleUserSkill(){
       
   }
   
   public function deleteSingleUserSkill(){
       
   }
}

?>
-->