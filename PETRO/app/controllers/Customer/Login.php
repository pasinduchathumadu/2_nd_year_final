<?php

class Login extends Controller
{
    public function __construct(){
        $this->login=$this->model('M_Login');
    }
    public function index(){
        $this->view('Customer/login');

    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'email'=>trim($_POST['email']),
                'pass'=>trim($_POST['password']),
                'err'=>'',

            ];
            $result=$this->login->login($data);
            if($result){
                header('location:http://localhost/PETRO/public/Customer/Home');

            }
            else{
                $data['err']='Password or Username is Incorrect!';
                $this->view('Customer/login',$data);
            }
        }
    }

 }