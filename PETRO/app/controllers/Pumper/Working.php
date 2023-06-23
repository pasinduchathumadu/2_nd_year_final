<?php

class Working extends Controller
{
    public $working;
    public function __construct(){
        $this->working=$this->model('M_Working');
    }
    public function index(){
        $data=[
            'pumper_id'=>$_SESSION['id'],
            'error'=>'',
        ];
        $result=($this->working->details_working($data));
    
            $this->view('Pumper/working',$result);
        
  
    }
    publiC function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){

            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'from'=>trim($_POST['from']),
                'to'=>trim($_POST['to']),
              
            ];
            $result=$this->working->previous1($data);
            if($result){
                $this->view('Pumper/Working',$result);
            }
            else{
               
                $this->view('Pumper/Working',$data);
            }
        }
    }
}