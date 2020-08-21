<?php
     use Myapp\Core\BaseController;
    /**
    * The home page controller
    */
    class IndexController extends BaseController
    {
        private $model;

        function __construct()
        {
            $this->model=$this->model("IndexModel");
        }

        public function index()
        {
            $data= $this->model->welcomeMessage();
            $this->view("index_view",$data);
        }


    }




