<?php

class Logout extends Controller{
    public $profile;
    public function __construct(){
        $this->profile=$this->model('M_Logout');
    }
    public function index(){
        $result=$this->profile->logout();
        if($result){
            header('location:http://localhost/PETRO/public/Home/Login');
        }
       
    }

   
}