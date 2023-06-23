<?php

class Product extends Controller{

    public $Product;
    public function __construct(){
        $this->Product=$this->model('M_Product');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->Product->Product($data));
        if($result){
            $this->view('Manager/Product',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/Product',$data);
        }
    }


    public function Add_product(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'name'=>trim($_POST['product']),
                'id'=>trim($_POST['id']),
                'image'=>trim($_POST['image']),
                'quantity'=>trim($_POST['quantity']),
                'price'=>trim($_POST['price']),
                
                'err'=>'',

            ];
        }

        if($this->Product->Add_product($data)){
            header('location:http://localhost/PETRO/public/Manager/Product');
            //$this->view(Manager/octane);
        }
    }

    public function New_product(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'name'=>trim($_POST['product']),
                'description'=>trim($_POST['description']),
                'image'=>trim($_POST['image']),
                'quantity'=>trim($_POST['quantity']),
                'price'=>trim($_POST['price']),
                
                'err'=>'',

            ];
        }

        if($this->Product->New_product($data)){
            header('location:http://localhost/PETRO/public/Manager/Product');
            //$this->view(Manager/octane);
        }
    }
}