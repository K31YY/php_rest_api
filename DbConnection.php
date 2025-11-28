<?php 
    class DbConnection {
        // data members o members variable
        private $hostname = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "p18btb212";

        // method to connect to the database
        public function connect() {
            // Create connection
            try{
                $conn = new mysqli(
                    $this->hostname, 
                    $this->username, 
                    $this->password, 
                    $this->database);
                return $conn;
            }catch(Exception $ex){  
                echo "error: " . $ex->getMessage();
            }
        }
    }
?>