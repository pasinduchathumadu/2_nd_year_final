<?php

class Reset extends Controller
{
    public $reset;
    public function __construct(){
        $this->reset=$this->model('M_final');
    }
    public function index(){
        $this->view('Pumper/reset_password');
    }
    public function details(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $Email = $_SESSION['Email'];
            $new =trim($_POST['new_password']);
            $confirm = trim($_POST['confirm_password']);
            $data=[
                'new'=>$new,
                'confirm'=>$confirm,
                'Email'=>$Email,
            ];
            $check = $this->reset->check($data);
            if($check){
                $data=[
                    'error'=>"YOUR PASSWORD HAS BEEN CHANGED!",
                ];
                $this->view('Pumper/reset_password',$data);
            }
            else{
                $data=[
                    'error'=>"PASSWORD DIDN'T MATCHED!",
                ];
                $this->view('Pumper/reset_password',$data);
            }
        }
    }
}