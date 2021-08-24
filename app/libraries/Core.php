<?php
    /*
    *App Core Class
    *Create url & laads core crontroller
    *URL FORMAT -/controller/method/params
    */
class Core
{   protected $currentController='Pages';
    protected $currentMethod='index';
    protected $params=[];
    
    public function __construct() {
     //print_r($this->getUrl());

     $url1=$this->getUrl();
     
     //look in controllers in first values

     // Look in controllers for first value
     if(file_exists('../app/controllers/' . ucwords($url1[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url1[0]);
        // Unset 0 Index
        unset($url1[0]);
      }

     //require thecontroller

     require_once '../app/controllers/'. $this->currentController . '.php';
     //inisialise controllers class 

     $this->currentController=new $this->currentController;

     if(isset($url1[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url1[1])){
          $this->currentMethod = $url1[1];
          // Unset 1 index
          unset($url1[1]);
        }
      }
        $this->params=$url1 ? array_values($url1) : [];

        call_user_func_array([$this->currentController,$this->currentMethod],$this->params);

    }
    public function getUrl(){
         if(isset($_GET['url'])){
            $url1=rtrim($_GET['url'], '/');
            $url1=filter_var($url1, FILTER_SANITIZE_URL);
            $url1=explode('/', $url1);
             return $url1;
         }
    }
}