<?php

class Ordervehicle1 extends Controller
{
    public $ordervehicle1;
    public function __construct(){
        $this->ordervehicle1=$this->model('M_Ordervehicle1');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
           
            'email'=>'',

        ];
       
        
        $result=$this->ordervehicle1->ordervehicle1($data);
        if($result){

            $this->view('Customer/ordervehicle1',$result);
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

          $insert= $this->ordervehicle1->add($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Customer/Orderticketvehicle');

           }
           
           if($insert==2){
            header('location:http://localhost/PETRO/public/Customer/Ordervehicle1');

         }
       
           else{

   
                $this->view('Customer/Ordervehicle1',$insert);

            }

        }
                
        }

    }



