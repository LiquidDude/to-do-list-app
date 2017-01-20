<?php 
class DbManager { 
 
    private $host = "localhost"; 
    private $db_name = "to_do_list_app"; 
    private $username = "root"; 
    private $password = ""; 
    //public $conn = NULL; 
    
    public function Connect() {

        // Create connection
        $conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            //echo 'Connected to database';
            return $conn;
        }
    }

}

?>