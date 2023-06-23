<?php

class New_product extends Controller{

    public $Product;
    public function __construct(){
        $this->New_product=$this->model('M_New_Product');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->New_product->Product($data));
        if($result){
            $this->view('Manager/New_product',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/New_product',$data);
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

        if($this->New_product->New_product($data)){
            header('location:http://localhost/PETRO/public/Manager/View_product');
            //$this->view(Manager/octane);
        }
    }
}