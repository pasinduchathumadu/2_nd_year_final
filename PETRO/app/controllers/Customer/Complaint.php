<?php

class Complaint extends Controller
{
    public $complaint;
    public function __construct(){
        $this->complaint=$this->model('M_Complaint');
    }
  
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->complaint->complaint($data);
        if($result){
            $this->view('Customer/complaint',$result);
        }
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'id' => $id,
         
                'complaint' => trim( $_POST['complaint']),
              
               
        
                'err'=>'',

            ];

          $insert= $this->complaint->add($data);
         
          if($insert){
              $this->view('Customer/complaint',$insert);
                
        }

    }
    
}
}