<?php

class Pages extends controller
{
    public function __construct()
    {
        $this->postModel=$this->model('Post');
    }
    public function index(){
        $posts= $this->postModel->getPosts();
        
        $data=[
            'title'=>'wel come',
            'posts'=> $posts 
        ];
          $this->view('pages/index',$data);
    }

    public function about(){
        $data=[
            'title'=>"Load about"
        ];
          $this->view('pages/about',$data);
    }
}