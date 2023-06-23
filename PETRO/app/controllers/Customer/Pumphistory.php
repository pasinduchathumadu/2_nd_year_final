<?php

class Pumphistory extends Controller
{
    public $pumphistory;
    public function __construct(){
        $this->pumphistory=$this->model('M_Pumphistory');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'error'=>'',
        ];
        $result=($this->pumphistory->pumphistory($data));
        if($result){
            $this->view('Customer/pumphistory',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Customer/pumphistory',$data);
        }
    }

    
    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['id'];

            $data=[

                'id' => $id,
                'startDate' => trim( $_POST['startDate']),
                'finishDate' => trim( $_POST['finishDate']),
              
                
                
               
        
                'err'=>'',

            ];

          $insert= $this->pumphistory->add($data);
        if($insert==1){
            $this->view('Customer/Pumphistory',$insert);

           }
       
           else{

   
                $this->view('Customer/Pumphistory',$insert);

            }

        }
                
        }
}