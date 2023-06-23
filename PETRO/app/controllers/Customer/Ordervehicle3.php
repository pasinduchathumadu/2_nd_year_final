<?php

class Ordervehicle3 extends Controller
{
    public function __construct(){
        $this->ordervehicle3=$this->model('M_Ordervehicle3');
        $this->ordervehicle=$this->model('M_Ordervehicle3');
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->ordervehicle3->ordervehicle3($data);
        if($result){
            $this->view('Customer/ordervehicle3',$result);
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'id' => $id,
                'email' => trim( $_POST['email']),
                'vno' => trim( $_POST['vno']),
                'vtype' => trim( $_POST['vtype']),
                'ftype' => trim( $_POST['ftype']),
                'amount' => trim( $_POST['amount']),
                'points' => trim( $_POST['points']),
                'petropoints' => trim( $_POST['petropoints']),
               
               
        
                'err'=>'',

            ];

          $insert= $this->ordervehicle3->add($data);
    
          if($insert==1){
                header('location:http://localhost/PETRO/public/Customer/Orderticketvehicle');
  
             }
         
             else{
  
     
                  $this->view('Customer/Ordervehicle3',$insert);
  
              }
                
        }

    }
}


