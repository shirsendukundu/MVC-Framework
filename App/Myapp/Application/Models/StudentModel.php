<?php
	//require('Core/base_model.php');
 	use Myapp\Core\BaseModel;
 
	class StudentModel extends BaseModel {
				public $data = array(
					"course_name"=>"24",
					"duration"=>"51",
					"course_fees"=>"20000");

	
			function __construct(){
				//set the table name
				$table=array("student");
				//pass the table name into the parent class
				parent::__construct($table);

			}

			//select all students
			function allstudents(){
			// call the select() method of db 
			return $res=$this->select();
				
				
			}

			//update student record
			function update_student(){
			return $this->update($this->data);

			}		
			//function delete student
			function delete_student($id){
				if($this->delete($id)){
					return "Record deleted Successfully";
				}
				else{
					return "Sorry not deleted";
				}
			}

			//insert new student
			function insert_student(){
			return $this->insert($this->data);
			}




}




