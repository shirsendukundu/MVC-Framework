<?php

	$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'],'/')) : '/';

    if ($url == '/')
    {

        // This is the home/index page
        // Initiate the home/index controller
       
        require_once __DIR__.'/../Application/Controllers/indexController.php';
       
        $indexController = New IndexController();
        $indexController->index();

    }else{


        // This is not home page
        // Initiate the appropriate controller
        //The first element should be a controller
        $requestedController = $url[0]; 

        // If a second part is added in the URI, 
        // it should be a method
        $requestedAction = isset($url[1])? $url[1] :'';

        // The remain parts are considered as 
        // arguments of the method
        $requestedParams = array_slice($url, 2); 

        // Check if controller exists. NB: 
        // You have to do that for the model and the view too
        $ctrlPath = __DIR__.'/../Application/Controllers/'.$requestedController.'Controller.php';



        if (file_exists($ctrlPath))
        {
            // class file include
           
            require_once __DIR__.'/../Application/Controllers/'.$requestedController.'Controller.php';
            
            //class obj instantited
            
   	        $controllerName = ucfirst($requestedController).'Controller';
            
            $controllerObj  = new $controllerName();
           

            // If there is a method - Second parameter
            if ($requestedAction != '')
            {
                // then we call the method via the controller
                // dynamic call of the method and pass params
                $controllerObj->$requestedAction($requestedParams);

            }

        }else{

            header('HTTP/1.1 404 Not Found');
            die('404 - The file - '.$ctrlPath.' - not found');
            //require the 404 controller and initiate it
            //Display its view
        }
    }