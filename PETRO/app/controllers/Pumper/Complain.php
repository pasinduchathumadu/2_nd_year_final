<?php

class Complain extends Controller
{
    public $complain;
    public function __construct(){
        $this->complain=$this->model('M_Complain');
    }
    // first call this function
    public function index(){
        $result=$this->complain->get();
        $this->view('Pumper/Complain',$result);
    }
    public function load(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'email'=>trim($_POST['email']),
               
                'subject'=>trim($_POST['subject']),

            ];
            $result=$this->complain->load($data);
            // redirect to the page
            header('location:http://localhost/PETRO/public/Pumper/Complain');
            
        }

    }
}