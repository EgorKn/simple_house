<?php
    class Database
    {
        public $conn;
        function __construct()
        {
            try{
                $this->conn = new PDO('mysql:host=localhost;dbname=test','root','');
            }catch(PDOException $e){
                var_dump($e->getMessage());
            }
        }
    }
    $db = new Database();
?>