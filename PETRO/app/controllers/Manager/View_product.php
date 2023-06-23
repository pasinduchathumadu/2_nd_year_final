<?php

class View_product extends Controller{

    public $Product;
    public function __construct(){
        $this->View_product=$this->model('M_view_product');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->View_product->View_product($data));
        if($result){
            $this->view('Manager/View_product',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/View_product',$data);
        }
    }

}

?>