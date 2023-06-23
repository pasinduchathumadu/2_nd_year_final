<?php

class Register extends Controller
{
    public function __construct(){
        $this->register=$this->model('M_Register');
    }
    public function index(){
        $this->view('Customer/register');

    }
        
    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[

                'fname' => trim( $_POST['fname']),
                'lname' => trim( $_POST['lname']),
                'NIC' => trim( $_POST['NIC']),
                'email' => trim( $_POST['email']),
                'phone' => trim( $_POST['phone']),
                'vno' => trim( $_POST['vno']),
                'vtype' => trim( $_POST['vtype']),
                'ftype' => trim( $_POST['ftype']),
                
          
                
                'pass' => trim($_POST['password']),
                'cpass' => trim($_POST['cpassword']),
                'points' => trim($_POST['points']),
                'message' =>'',

        
                'err'=>'',

            ];

         

          $insert= $this->register->register($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Home/Login');

           }
           else{
            if($insert==4){
                $message = 'Confirm password not matched!';
                $data['message']=$message;
                $this->view('Customer/register',$data);

            }
            else if($insert==3){
                $message = 'user with that vehicle number already exists!';
                $data['message']=$message;
                $this->view('Customer/register',$data);
            }

            else if($insert==5){
                $message = 'user with that mobile number already exists!';
                $data['message']=$message;
                $this->view('Customer/register',$data);
            }

        

            else if($insert==7){
                $message = 'required fields must be filled!';
                $data['message']=$message;
                $this->view('Customer/register',$data);
            } 

            else if($insert==10){
                $message = 'required length of NIC not fulfilled!';
                $data['message']=$message;
                $this->view('Customer/register',$data);
            } 

            else if($insert==11){
                $message = 'required length of Password not fulfilled!';
                $data['message']=$message;
                $this->view('Customer/register',$data);
            } 
            else{
            $message = 'user with that Email already exist';
            $data['message']=$message;
            $this->view('Customer/register',$data);
            }
           }
                
        }
    }}
    