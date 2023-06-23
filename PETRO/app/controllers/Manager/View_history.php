<?php

class View_history extends Controller{
    public $View_history;
    public function __construct(){
        $this->View_history=$this->model('M_View_history');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->View_history->View_history($data));
        if($result){
            $this->view('Manager/View_history',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/View_history',$data);
        }
    }

    public function get_Date(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'startDate'=>trim($_POST['startDate']),
                'finishDate'=>trim($_POST['finishDate']),
                
                'err'=>'',

            ];
            $_SESSION['startDate']=$data['startDate'];
            $_SESSION['finishDate']=$data['finishDate'];

        }
            if($this->View_history->get_Date($data)){
                header('location:http://localhost/PETRO/public/Manager/Analize');
            
                //$this->view(Manager/octane);
                
            }
            

    }
}