<?php 
    class functions {
        // data members or members variables
        private $db;
        private $sql;
        private $result;
        // contructor 
        function __construct()
        {
            require_once 'DbConnection.php';
            // creating an instance/object of class DbConnection
            $this->db = new DbConnection();
            // calling the connect method
            $this->db->connect();
        }
      
        // destructor
        function __destruct()
        {
            // closing the database connection
            $this->db->connect()->close();
        }
      
        // method 
        public function insert_data($tablename, $fields, $values){
            $count = count($fields); // count fields in array
            // generate INSERT statement
            $this->sql = "INSERT INTO $tablename(";
            for($i=0; $i < $count; $i++){
                $this->sql .= $fields[$i];
                if($i < $count - 1){
                    $this->sql .= ",";
                }else{
                    $this->sql .= ") VALUES (";
                }
            }
            for($i=0; $i < $count; $i++){
                $this->sql .= "'". $values[$i]. "'";
                if($i < $count - 1){
                    $this->sql .= ",";
                }else{
                    $this->sql .= ");";
                }
            }

            //execute INSERT statement
            $this->result = $this->db->connect()->query($this->sql);
            if($this->result === TRUE){
                return true;
            }else{
                return false;
            } 
        }
        public function show_data($tablename){
            $data = array();
            $this->sql = "SELECT * FROM $tablename;";
            $this->result = $this->db->connect()->query($this->sql);
            while($rows = $this->result->fetch_assoc()){
                $data[] = $rows;
            }
            return $data;
        }
        public function delete_record($tablename, $fid, $vid){
            if(is_numeric($vid)){
                $this->sql = "DELETE FROM $tablename WHERE $fid = $vid;";
            }else{
                $this->sql = "DELETE FROM $tablename WHERE $fid = '$vid';";
            }
            $this->result = $this->db->connect()->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
    }
        
?>