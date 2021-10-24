<?php

class Database{//Database connection configuration class
   const DB_HOSTNAME = 'localhost';
   const DB_USERNAME = 'root';
   const DB_PASSWORD = '';
   const DB_NAME = 'bookingsdb';
   public $_db_connect;

   function db_connect(){
     $this->_db_connect = mysqli_connect(self::DB_HOSTNAME,self::DB_USERNAME,self::DB_PASSWORD,self::DB_NAME) or die("Couldn't connect");
     return $this->_db_connect;
   }

}


?>

