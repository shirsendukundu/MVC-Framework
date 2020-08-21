<?php
namespace Myapp\Core;
require_once "config/config.php";

class DbConnect{
          
          private $host;  
          private $username;
          private $password;
          private $database;
          private $con;

          public function __Construct(){
            
            $this->host=HOST;
            $this->username=DB_USER;
            $this->password=DB_PASS;
            $this->database=DB_NAME;

          }

          //connect inititaed
          public function connect(){
          //initiated db connection
          $this->con = new \mysqli($this->host, $this->username, $this->password,$this->database);
          // check if fail
          if ($this->con->connect_errno) {
          printf("Connect failed: %s\n", $mysqli->connect_error);
          exit();
          }
          else{
            return $this->con;
          }

      }

          

}