<?php

class Storehistory extends Controller
{
    public $storehistory;
    public function __construct(){
        $this->storehistory=$this->model('M_Storehistory');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'error'=>'',
        ];
        $result=($this->storehistory->storehistory($data));
        if($result){
            $this->view('Customer/storehistory',$result);
        }
        else{
            $data['error']="No Records to Show";
            $this->view('Customer/storehistory',$data);
        }
    }
}