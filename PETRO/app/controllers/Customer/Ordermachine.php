<?php

class Ordermachine extends Controller
{
    public function __construct(){
        $this->ordermachine=$this->model('M_Ordermachine');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->ordermachine->ordermachine($data);
        if($result){
            $this->view('Customer/ordermachine',$result);
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

                
                'ftype' => trim( $_POST['ftype']),
                'amount' => trim( $_POST['amount']),
                'points' => trim( $_POST['points']),
                'petropoints' => trim( $_POST['petropoints']),
           
               
        
                'err'=>'',

            ];

          $insert= $this->ordermachine->add($data);
 
          if($insert==1){
            header('location:http://localhost/PETRO/public/Customer/Orderticketmachine');

         }
     
         else{

 
              $this->view('Customer/Ordermachine',$insert);

          }
                
        }

    }
}


