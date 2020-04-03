<?php

    class connection{

        public $conn;
        public function __construct(){
            $this->conn = new PDO("mysql:host=localhost;dbname=contactlist","root","");
        }

        

    public function insert($query,$array){
        $statement = $this->conn->prepare($query);
        $statement->execute($array);

    }

    public function fetch($query,$array){
        $statement = $this->conn->prepare($query);
        $statement->execute($array);
        $data = $statement->fetchAll();
        return $data;

        
    }

}

?>