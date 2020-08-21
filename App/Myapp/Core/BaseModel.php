<?php

namespace Myapp\Core;
//include('Core/DbConnect.php');
 //Use Myapp\Core\DbConnect;

class BaseModel {

         //declaring the private variables that you will access through $this->variable;
 
          private $conn;  // Adding the connection, more on this later.
          private $table; //need to be assighn from the child class _construct()

          //

          public function __Construct($table){
          
          //dbconnect obj instance
          //set the connection obj on $conn property
          $db=new DbConnect;
          $this->conn=$db->connect();
          //set table name that use in the query
          $this->table=$table;
         }
  
          //select * from table

          public function select(){

          // Adding the connection to the function and return the result object instead
          $result= mysqli_query($this->conn,"SELECT * FROM ".$this->table[0]);
          // Fetch all
          return $result -> fetch_all(MYSQLI_ASSOC);

          }



          //update record
          //passing the data argument is mandatory
          // Assuming that all the fields names in the table are the same as //the names of your form inputs this is straight forward.

           public function update(array $data){
          //dynamically query generate
            $query = "UPDATE ".$this->table[0]." SET";
            $comma = " ";
            foreach ($data as $key => $value) {
                   if( ! empty($value)) {
                    $query  .= $comma . $key . " = '" .trim($value) . "'";
                    $comma = ", ";
                  }
            }
          //finaly query generated as per your form fields name and value
            
            $sql= $query. " WHERE sid = '".$data["sid"]."'";
          //run the query
            return mysqli_query($this->conn,$sql);
           }





          /*Delete method
          pass the primary key*/
           public function delete($id){
           $sql=" DELETE FROM " .$this->table[0]." WHERE sid= '".$id."'";
           return mysqli_query($this->conn, $sql);
           }




         /*insert record
         passing the data argument is mandatory
         Assuming that all the field names in the table are the same as the names of your form inputs this is straight forward.*/


           public function insert(array $data){
          //dynamically query generate as per your form data
           $query_key = "INSERT INTO ".$this->table[0]." (";
           $query_value =null;   
           $comma = " ";      
          // loop the form data and assighn the key value in query
              foreach ($data as $key => $value) {
                    
                 $query_key  .= $comma . $key ;
                 $query_value .=$comma."'".$value."'";
                 $comma = ", ";
                }
          //final sql query
           $sql= $query_key.=" ) VALUES (".$query_value.")";
          //echo $sql;
           return mysqli_query($this->conn,$sql);

           }


          //custom query receive sql params
           public function query($sql){
           return mysqli_query($this->conn,$sql);

           }

}





?>