<?php

class View_order extends Controller{

    public $View_order;
    public function __construct(){
        $this->View_order=$this->model('M_View_order');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['distribution_manager_id'],

        ];
        $result=($this->View_order->View_order($data));
        if($result){
            $this->view('Manager/View_order',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Manager/View_order',$data);
        }
    }
}