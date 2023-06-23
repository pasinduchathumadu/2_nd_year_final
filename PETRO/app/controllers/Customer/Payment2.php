<?php

class Payment2 extends Controller
{
    public function __construct(){
        $this->payment2=$this->model('M_Payment2');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'total'=>$_SESSION['total'],
            'address'=>$_SESSION['address'],
            'phone'=>$_SESSION['phone'],
            'pmethod'=>$_SESSION['pmethod'],
        

        ];
        $result=$this->payment2->payment2($data);
        if($result){
            $this->view('Customer/payment2',$result);
        }
    }






    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];
            $data=[
                'user_id'=>trim($_POST['user_id']),
                'pids'=>trim($_POST['pids']),
                'address'=>trim($_POST['address']),
                'phone'=>trim($_POST['phone']),
                'total'=>trim($_POST['total']),
                'pmethod'=>trim($_POST['pmethod']),
                'quantity'=>trim($_POST['quantity']),
                'name'=>trim($_POST['name']),
                'p_id'=>trim($_POST['p_id']),
                'points'=>trim($_POST['points']),
              
                
            ];
            


            $insert= $this->payment2->add($data);
            if($insert==1){
       
      
              header('location:http://localhost/PETRO/public/Customer/Success');

           }

        
           else{
           
            header('location:http://localhost/PETRO/public/Customer/Fail');

           }
                
        }

    }
    }

    