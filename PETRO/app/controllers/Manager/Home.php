<?php

class Home extends Controller{
    public $Home;
    public function __construct(){
        $this->Home=$this->model('M_Home');
    }

    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];

        $result=($this->Home->view($data));
        if($result){
            $this->view('Manager/Home',$result);
        }
        else{
            $this->view('Manager/Home',$data);
        }
        
    }


}