<?php

class Email extends Controller{

    public $email;
    
    public function __construct(){
        $this->email=$this->model('M_Email');
    }
    public function index(){
        $result=$this->email->details();
        $data=[
            'email'=>$result['email'],
            'last'=>$result['last'],
            'first'=>$result['first']
        ];
        $this->view('Admin/email',$data);
    }
}