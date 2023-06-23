<?php

class Signup extends Controller
{
    public $RegisterModel;
    public function __construct(){
        $this->RegisterModel=$this->model('M_Signup');
    }
    public function index(){
        $this->view('Pumper/signup');
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'Email'=>trim($_POST['Email']),
                'pumper_id'=>trim($_POST['id']),
                'First_name'=>trim($_POST['firstName']),
                'Last_name'=>trim($_POST['lastName']),
                'password'=>trim($_POST['password']),
                'contact'=>trim($_POST['phoneNumber']),
                'nic'=>trim($_POST['nic']),
                'gender'=>trim($_POST['gender']),
                'confirm_password'=>trim($_POST['cpassword']),
                'err'=>'',

            ];

            if(empty($this->RegisterModel->pumper_register($data))){
                    header('location:http://localhost/PETRO/public/Staff-manager/View_pumper');
            }
            else{
                    $error_message=$this->RegisterModel->register($data);
                    $data['err']=$error_message;
                    $this->view('Pumper/signup',$data);
            }

        }
    }
}