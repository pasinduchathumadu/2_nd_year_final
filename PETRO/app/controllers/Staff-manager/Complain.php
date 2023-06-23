<?php

class Complain extends Controller
{
    public $order;
    public function __construct()
    {
        $this->order=$this->model('M_complain');
    }

    public function index()
    {
        
        $result = $this->order->edit_complain();

        if($result){
            $this->view('Staff-manager/Complain',$result);

        }
        else{
            $this->view('Staff-manager/Complain',);
        }
    }

}