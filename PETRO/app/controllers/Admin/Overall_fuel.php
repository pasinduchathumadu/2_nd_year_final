<?php

use FontLib\Table\Type\post;

class Overall_fuel extends Controller{
    public $overall;
    public function __construct(){
        $this->overall=$this->model('M_Overall');
    }
    public function index(){
        $result=$this->overall->load();
        $this->view('Admin/overall_fuel',$result);
    }
    public function previous(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'from'=>trim($_POST['from']),
                'to'=>trim($_POST['to']),
            ];

            $result=$this->overall->previous($data);
            $this->view('Admin/overall_fuel',$result);

        }
    }
    
}