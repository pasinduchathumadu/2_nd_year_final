<?php

class working_hours extends Controller{
    public $hours;
    public function __construct(){
        $this->hours=$this->model('M_Hours');
    }
    public function index(){
       
        // obtain records from database
        $result = $this->hours->details();
        $this->view("Pumper/hours",$result);
       
    }
    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            // sort the date
            $data=[
                'from'=>trim($_POST['from']),
                'to'=>trim($_POST['to']),
                'error'=>'',
            ];
            $result=$this->hours->previous1($data);
            if($result){
                $this->view('Pumper/hours',$result);
            }
            else{
                $data['err'] = "No Records!!";
                $this->view('Pumper/hours',$data);
            }
        }
    }
}