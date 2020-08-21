<?php
namespace Myapp\Core;

 //use \Myapp\Environment;
 //use \Myapp\Loader\FilesystemLoader;
class BaseController{

		//load view. Arg take the view name
		//second argument take data that will be render in template
		public function view($view,$data){
		
		$viewPath ='Application/Views/'.ucfirst($view).'.html';
		
		if(file_exists($viewPath)){
		//using twig file sysytem loader	
		$loader = new \Twig_Loader_Filesystem('Application/Views');
		$twig = new \Twig_Environment($loader);
		
		echo $twig->render(ucfirst($view).".html", ["datas"=>$data]);
		}
		else{
			die( "Sorry! View <b>".$viewPath." </b>doesnot exits");
		}
		
	 }


	//load model on the basis of controller call
	//argument take model name

	public function model($model){

		$modelPath ='Application/Models/'.$model.'.php';
		
		if(file_exists($modelPath)){
			include $modelPath;
			$modelclassname=ucfirst($model);
			return new $modelclassname;
		}	
		else{
			 die("Sorry! model </b>".$modelPath."</b> does't exits in");
		}
	}

}
