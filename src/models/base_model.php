<?php
    require_once("../configs/database.php");
    class BaseModel{//base model class to define reusable db connection
        protected $conn;
        function __construct() {
            $database = new Database();
            $this->conn  = $database->db_connect(); 
        }

    }

?>
