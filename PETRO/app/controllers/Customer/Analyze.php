<?php

class Analyze extends Controller{
    public $Analize;
    public function __construct(){
        $this->Analyze=$this->model('M_Analyze');
    }

    public function index(){
        $data=[
          'loading'=>0,
        ];
        $result = $this->Analyze->Analyze($data);
        if($result){
            $this->view('Customer/analyze',$result);
    }
}

    public function Analyze(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'startDate'=>trim($_POST['startDate']),
                'finishDate'=>trim($_POST['finishDate']),
                'No'=>trim($_POST['No']),
                'loading'=>1,
            ];

            $result = $this->Analyze->Analyze($data);
            if($result){
                $this->view('Customer/analyze',$result);
                
            }
        }


    }
}
