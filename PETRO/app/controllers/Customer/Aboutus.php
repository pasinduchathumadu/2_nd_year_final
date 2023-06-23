<?php

class Aboutus extends Controller{
   
    public function __construct(){
        $this->aboutus=$this->model('M_Aboutus');
    }

    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            

        ];
        $result=$this->aboutus->aboutus($data);
        if($result){
            $this->view('Customer/aboutus',$result);
        }
    }

}