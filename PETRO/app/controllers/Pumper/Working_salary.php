<?php

class working_salary extends Controller{
    public $salary;
    public function __construct(){
        $this->salary=$this->model('M_salary');
    }
    public function index(){
        $data=[
            'download'=>0,
        ];
        $result=$this->salary->loading($data);
        if($result){
            $this->view('Pumper/salary',$result);
        }
    }
    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'date'=>trim($_POST['bdaymonth']),
                'download'=>0,
                'err'=>'',
            ];
            $result=$this->salary->previous($data);
            if($result){
                $this->view('Pumper/salary',$result);
            }
            else{
                $this->view('Pumper/salary',$data);
            }
        }


    }

    public function Download(){

        $month = $_GET['month'];
        $year = $_GET['year'];

      
        
        $data = [
            'download'=>1,
            'month'=>$month,
            'year'=>$year,
        ];
        $result=$this->salary->loading($data);

        
    }


}