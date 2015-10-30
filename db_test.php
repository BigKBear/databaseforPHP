<?php
require_once('db_class.php');

class DatabaseTests extends PHPUnit_Framework_TestCase {
    
    public function testGetInstance(){
        /*
        Uses: Database::getInstance
        Provides: null
        Expects:String: Database
        */
        $db = Database::getInstance();
        $this->assertEquals("Database",get_class($db));
    }
    
    

}