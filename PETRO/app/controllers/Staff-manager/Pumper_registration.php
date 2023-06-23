
<?php

class Pumper_registration extends Controller
{
    public $order;
    public function __construct()
    {
        $this->order=$this->model('M_pumper_registration');
    }

    public function index()
    {
        
        $this->view('Staff-manager/Pumper_registration');
    }

    public function pumperRegistration(){
        //get user data and asign in to variables (escape special character)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $record=[
                'id'=>trim($_POST['id']),
                'first_name'=>trim($_POST['firstName']),
                'last_name'=>trim($_POST['lastName']),
                'phone_no'=>trim($_POST['phoneNumber']),
                'nic'=>trim($_POST['nic']),
                'shift'=>trim($_POST['shift']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'confirmPassword'=>trim($_POST['cpassword']),
                'error'=>'',

            ];
            
            //check the user email is already registerd to the system
            $userExist = $this->order->user_exist($record);
            
            if($userExist){
                $error['error']="user already exist!";
                $this->view('Staff-manager/Pumper_registration',$error);
            }
            else{
                $result = $this->order->submit_record($record);
                if($result == 1){
                    header('location:http://localhost/PETRO/Public/Staff-manager/View_pumper');
        
                }
                elseif($result == 0){
                    $error['error']="Password not matched";
                    $this->view('Staff-manager/Pumper_registration',$error);
                }
                else{
                    $error['error']="Password should be at least 8 characters in length and should include " . PHP_EOL . " at least one upper case letter, " . PHP_EOL . " one number, and " . PHP_EOL . " one special character";
                    $this->view('Staff-manager/Pumper_registration',$error);
                }
            }

            
        }

    }

}