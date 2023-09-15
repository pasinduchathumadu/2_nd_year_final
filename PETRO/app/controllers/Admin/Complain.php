<?php

class Complain extends Controller{

    public $complain;
    public function __construct(){
        $this->complain=$this->model('M_Complain');
    }

    public function index(){
        $result=$this->complain->complain();
        $this->view('Admin/complain',$result);
    }
    public function load(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'com_id'=>trim($_POST['id']),
            ];
            $result=$this->complain->load($data);
            $this->view('Admin/reply',$result);
        }
        
    }
    public function reply(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'com_id'=>trim($_POST['id']),
            ];
            $result=$this->complain->reply($data);
            $this->view('Admin/reply1',$result);
        }
        
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'response'=>trim($_POST['subject']),
                'id'=>trim($_POST['complain_ID']),
                
            ];

        $this->complain->register($data);
        header('location:http://localhost/PETRO/public/Admin/Complain');
        
        }
    }
}