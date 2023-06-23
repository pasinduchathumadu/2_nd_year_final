<?php
   

class Fail extends Controller
{
    public function __construct(){
        $this->success=$this->model('M_Fail');
    }


    public function index(){
        $data=[
            'id'=>$_SESSION['id'],
            'email'=>'',

        ];
  
            $this->view('Customer/fail');
        }


    
    }







  

