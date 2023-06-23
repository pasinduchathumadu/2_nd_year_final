<?php

class Analysis extends Controller{
    public $Analysis;
    public function __construct(){
        $this->Analysis=$this->Model('M_Analysis');
    }
    public function index(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('y-m-d');
        $data=[
            'date'=>$date,
        ];
        $result = $this->Analysis->loading($data);
        $this->view('Pumper/Analysis',$result);
    }
    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'date'=>trim($_POST['bdaymonth']),
              
            ];
            $result = $this->Analysis->loading($data);
            $this->view('Pumper/Analysis',$result);
        }
    }
}