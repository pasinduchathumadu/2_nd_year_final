<?php

class Change_password extends Controller
{
    public $change;
    public function __construct(){
        $this->change=$this->model('M_Change_password');
    }
    public function index(){
        $result=$this->change->load();
        $this->view('Pumper/change_password',$result);
    }

    public function change(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'current_password'=>trim($_POST['current_password']),
                'new_password'=>trim($_POST['new_password']),
                'confirm_password'=>trim($_POST['confirm_password']),
                

            ];
            $result=$this->change->change($data);
            $this->view('Pumper/change_password',$result);
        }
    }
}