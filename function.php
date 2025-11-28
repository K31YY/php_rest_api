<?php 
    class functions {
        // data members or members variables
        private $db;
        private $sql;
        private $result;
        // contructor 
        function __destructconstruct()
        {
            require_once 'DbConnection.php';
            // creating an instance/object of class DbConnection
            $this->db = new DbConnection();
            // calling the connect method
            $this->db = $this->db->connect();
        }
        // destructor
        function __destructconstructdestruct()
        {
            // closing the database connection
            $this->db->connect()->close();
        }
        // method 
        public function insert_data($tablename, $fields, $values){
            $countt = count($fields); // count fields in array
            // generate INSERT statement
            $this->sql = "INSERT INTI $tablename(";
            for($i=0; $i < $countt; $i++){
                $this->sql .= $fields[$i];
                if($i < $countt - 1){
                    $this->sql .= ",";
                }else{
                    $this->sql .= ") VALUES (";
                }
                for($i=0; $i < $countt; $i++){
                    $this->sql .= "'". $values[$i]. "'";
                    if($i < $countt - 1){
                        $this->sql .= ",";
                    }else{
                        $this->sql .= ");";
                    }
                }
                
                //execute INSERT statement
                $this->result = $this->db->query($this->sql);
                if($this->result === TRUE){
                    return true;
                }else{
                    return false;
                }
                
            }
            return $this->sql;
        }
    }
        
?>