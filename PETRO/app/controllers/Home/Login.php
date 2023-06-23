<?php

class Login extends Controller
{
    public $LoginModel;
    
    public function __construct(){
        $this->LoginModel=$this->model('M_Login');
    }
    public function index(){
        $this->view('Home/login');
    }

    public function login()
    {
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'Email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'err'=>'',
            ];
            $result=$this->LoginModel->login($data);

            if($result==1){
                date_default_timezone_set('Europe/London');
                $time = date('H:i:s');
                $_SESSION['login_time']=$time;
                $login =$_SESSION['login_time'];

                header('location:http://localhost/PETRO/public/Pumper/User');

            }
            elseif($result==2){
                date_default_timezone_set('Europe/London');
                $time = date('H:i:s');
                $_SESSION['login_time']=$time;
                $login =$_SESSION['login_time'];

                header('location:http://localhost/PETRO/public/Customer/Home');

            }
            elseif($result==3){
                date_default_timezone_set('Europe/London');
                $time = date('H:i:s');
                $_SESSION['login_time']=$time;
                $login =$_SESSION['login_time'];

                header('location:http://localhost/PETRO/public/Manager/Home');

            }
            elseif($result==4){
                date_default_timezone_set('Europe/London');
                $time = date('H:i:s');
                $_SESSION['login_time']=$time;
                $login =$_SESSION['login_time'];

                header('location:http://localhost/PETRO/public/Staff-manager/Home');

            }
            else{
                $data['err']='Password or Username is Incorrect!';
                $this->view('Home/login',$data);
            }
        }
    }
}
