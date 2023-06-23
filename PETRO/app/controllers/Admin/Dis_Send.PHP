<?php

class Dis_Send extends Controller{
    public $send;
    public function __construct(){
        $this->send=$this->model('M_Dis_Send');
    }
    public function index(){
        $email=trim($_POST['email']);
        $password = $_SESSION['password'];

        $data=[
            'email'=>$email,
            'password'=>$password,
        ];

        $result=$this->send->records($data);
        if($result['error']==0){
            $error="Message Sent Successfully!";
            $data = [
                'email'=>$email,
                'first'=>$result['first'],
                'last'=>$result['last'],
                'error'=>$error,

            ];
            $this->view('Admin/dis_email',$data);
        }
        else{
            $error="THIS MESSAGE IS NOT SEND!";
            $data = [
                'email'=>$email,
                'first'=>$result['first'],
                'last'=>$result['last'],
                'error'=>$error,

            ];
            $this->view('Admin/dis_email',$data);
        }

    }
}