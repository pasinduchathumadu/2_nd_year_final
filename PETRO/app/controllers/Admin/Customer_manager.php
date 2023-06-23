<?php 

class customer_manager extends Controller{
    public $manager;
    public function __construct(){
        $this->manager=$this->model('M_Cus_manager');
    }

    public function index(){
        $this->view('Admin/customer_manager');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=trim($_POST['customer_manager_id']);
            $first = trim($_POST['First_name']);
            $last = trim($_POST['Last_name']);
            $nic = trim($_POST['customer_manager_NIC']);
            $password = trim ($_POST['password']);
         
          
            $email = trim($_POST['customer_manager_email']);

            $data=[
                'id'=>$id,
                'first'=>$first,
                'last'=>$last,
                'nic'=>$nic,
               
                'password'=>$password,
                'email'=>$email,
            ];
            $result=$this->manager->register($data);
            if(empty($result['error'])){
                header('location:http://localhost/PETRO/Public/Admin/Email');
               
            }
            else{
                $data=[
                    'error'=>$result['error'],
                ];
                $this->view('Admin/customer_manager',$data);
            }
        }
    }
}