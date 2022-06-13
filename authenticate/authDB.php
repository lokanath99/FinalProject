<?php

    require 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';
    class dbManager{
        private $conn;
        private $connection_string = 'mongodb+srv://lokanath:lokanath1999@cluster0.hvfvb.mongodb.net/myFirstDatabase?retryWrites=true&w=majority'; 
        public function dbConnect(){
            try {
                $this->conn = new MongoDB\Client($this->connection_string);
                return $this->conn;
            }
            catch (Throwable $e) {
                // catch throwables when the connection is not a success
                echo "Captured Throwable for connection : " . $e->getMessage() . PHP_EOL;
                return $e->getMessage();
            }            
        }
        public function getConnectionString(){
            return $this->connection_string;
        }
    }    
        

?>