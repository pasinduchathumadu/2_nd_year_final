<?php

class Feedback extends Controller
{
    public $feedback;
    public function __construct(){
        $this->feedback=$this->model('M_Feedback');
    }
  
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->feedback->feedback($data);
        if($result){
            $this->view('Customer/feedback',$result);
        }
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'id' => $id,
         
                'status' => trim( $_POST['status']),
                'feedback' => trim( $_POST['feedback']),
              
               
        
                'err'=>'',

            ];

          $insert= $this->feedback->add($data);
         
          if($insert){
              $this->view('Customer/feedback',$insert);
                
        }

    }
    
}
}