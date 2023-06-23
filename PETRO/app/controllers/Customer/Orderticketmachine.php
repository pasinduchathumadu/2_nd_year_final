<?php

class Orderticketmachine extends Controller
{
    public $orderticketmachine;
    public function __construct(){
        $this->orderticketmachine=$this->model('M_Orderticketmachine');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
      
          
        

        ];
        $result=$this->orderticketmachine->orderticketmachine($data);
        if($result){
            $this->view('Customer/orderticketmachine',$result);
        }
       
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['id'];

            $data=[
                'Oid' => trim( $_POST['Oid']),

                'id' => $id,
                'email' => trim( $_POST['email']),
                'vno' => trim( $_POST['vno']),
                'vtype' => trim( $_POST['vtype']),
                'ftype' => trim( $_POST['ftype']),
                'amount' => trim( $_POST['amount']),
                'price' => trim( $_POST['price']),
                'ndate' => trim( $_POST['ndate']),
                'status' => trim( $_POST['status']),
                'usedpoints' => trim( $_POST['usedpoints']),
                'petropoints' => trim( $_POST['petropoints']),
               
        
                'err'=>'',

            ];
            

          $insert= $this->orderticketmachine->add($data);
        
        if($insert==1){
            $this->orderticketmachine->records($data);
            
              header('location:http://localhost/PETRO/public/Customer/Success');

           }
           else{
           
            header('location:http://localhost/PETRO/public/Customer/Fail');

           }
                
        }

    }
           
}


