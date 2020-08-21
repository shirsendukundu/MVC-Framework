<?php
	 
	//use namespace of BaseController;
	 use Myapp\Core\BaseController;
	

	class StudentController extends BaseController{
		 
		 private $model;

		 function __construct(){
		 //pass the model name and load the model
		 $this->model=$this->model("StudentModel");
		 
		 }

		 //fetch all student record
		 function allstudent(){
		 $data= $this->model->allstudents();
		 //pass the view name and load the view
		 //pass data to view template
		 $this->view('student',$data);
		 
		 }
	




	}




