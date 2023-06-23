<?php

class Income extends Controller{

    public $Product;
    public function __construct(){
        $this->Product=$this->model('M_Income');
    }
    public function index(){
        $result=($this->Product->income());
        
        $this->view('Admin/income',$result);
      
    }

    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'month'=>trim($_POST['bdaymonth']),
                
            ];
            $result=$this->Product->previous($data);
            $this->view('Admin/income',$result);
        
        }

    }
}