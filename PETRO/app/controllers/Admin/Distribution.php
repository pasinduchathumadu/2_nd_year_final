<?php 

class Distribution extends Controller{

    public $manager;
    public function __construct(){
        $this->manager=$this->model('M_dis_manager');
    }

    public function index(){
        $this->view('Admin/distribution');
    }

    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $id=trim($_POST['distribution_manager_id']);
            $first = trim($_POST['First_name']);
            $last = trim($_POST['Last_name']);
            $nic = trim($_POST['distribution_manager_NIC']);
            $password = trim ($_POST['password']);
            $email = trim($_POST['distribution_manager_email']);

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
                header('location:http://localhost/PETRO/Public/Admin/Dis_Email');
               
            }
            else{
                $data=[
                    'error'=>$result['error'],
                ];
                $this->view('Admin/distribution',$data);
            }
        }
    }
}