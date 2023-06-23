<?php

class Complain_reply extends Controller{

    public $complain;
    public function __construct(){
        $this->complain=$this->model('M_complain_reply');
    }

    public function index(){
        $com_id = $_GET['com_id'];
        $result=$this->complain->complain($com_id);
        
        $this->view('Staff-manager/Complain_reply',$result);
    }
    public function register(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $full_id = trim($_POST['com_id']);
            $id=substr($full_id,3);     //get sub string after 3rd position of full_id
            
            $data=[
                'com_id'=>$id,
                'user_id'=>trim($_POST['user_id']),
                'complain'=>trim($_POST['complain']),
                'response'=>trim($_POST['response']),
                'date_time'=>trim($_POST['date_time']),
                'status'=>trim($_POST['status']),
            ];
        
        $result = $this->complain->register($data);
        if($result){
            $data['success'] = 'Successfully Submission Saved';
        }else{
            $data['error'] = 'Submission Failed';
        }
        $this->view('Staff-manager/Complain_reply',$data);
        
        }
    }
}