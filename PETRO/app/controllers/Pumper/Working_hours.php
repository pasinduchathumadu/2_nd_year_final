<?php

class working_hours extends Controller{
    public $hours;
    public function __construct(){
        $this->hours=$this->model('M_Hours');
    }
    public function index(){
       
        $data=[
            'error'=>'',
        ];
        $result = $this->hours->details();
        if($result){
            $this->view("Pumper/hours",$result);
        }
        else{
            $data['error']="No Records";
            $this->view("Pumper/hours",$data);

        }
    }
    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

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