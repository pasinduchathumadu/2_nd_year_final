<?php

class Report_history extends Controller{

    public $Report_history;
    public function __construct(){
        $this->Report_history=$this->model('M_Report_history');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->Report_history->Report_history($data));
        if($result){
            $this->view('Manager/Report_history',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/Report_history',$data);
        }
    }

    public function View_report(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'date' => trim($_POST['date']),

                'err'=>'',

            ];
            $_SESSION['date']=$data['date'];


            
            if($this->Report_history->View_report($data)){

               
                //$this->view(Manager/octane);
                header('location:http://localhost/PETRO/public/Manager/Report');
          }
        }

            //echo "edcs";

    }
}