<?php
   

class Success extends Controller
{
    public $success;
    public function __construct(){
        $this->success=$this->model('M_Success');
    }


    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
  
            $this->view('Customer/success');
        }


    
    }







  

