<?php

class Productdetails extends Controller
{
    public function __construct(){
        $this->productdetails=$this->model('M_Productdetails');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->productdetails->productdetails($data);
        
       
            $this->view('Customer/productdetails',$result);
        
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'p_id'=>trim($_POST['p_id']),
                'product_image'=>trim($_POST['product_image']),
                'product_name'=>trim($_POST['product_name']),
                'product_price'=>trim($_POST['product_price']),
                'product_quantity'=>trim($_POST['product_quantity']),
                'cdate'=>trim($_POST['cdate']),
            
                'ndate'=>trim($_POST['ndate']),
                
            ];
            $result1=$this->productdetails->add($data);
            if($result1){
                $this->view('Customer/productdetails',$result1);
                
                
              
            }

    }

    }
}


