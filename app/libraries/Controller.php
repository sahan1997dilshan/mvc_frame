<?php

class controller
{ //load model
    public function model($model)
    {   //require model file
        require_once '../app/models/' .$model . '.php';
        
         //Initialize model

         return new $model();

    }

    //load views 

    public function view($view, $data =[])
    {
        //check for view file

        if(file_exists('../app/views/'. $view . '.php'))
        {
            require_once '../app/views/'. $view . '.php';
        }else{
            //view does not exist
            die('View file does not exist');
        }
    }
}