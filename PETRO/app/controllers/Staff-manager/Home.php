<?php

class Home extends Controller{
    public $dashboard;

    public function __construct()
    {
        $this->dashboard=$this->model('M_home');
    }
    
    public function index(){
        $result = $this->dashboard->getCount();
        $this->view('staff-manager/home',$result);
    }

    public function logout(){
        $result=$this->dashboard->logout();
        if($result){
            header('location:http://localhost/PETRO/public/Pumper/Login');
        }
    }
}