<?php
   

class Home extends Controller
{
    public $home;
    public function __construct(){
        $this->home=$this->model('M_Home');
    }


    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->home->mv($data);
        if($result){
            $this->view('Customer/home',$result);
        }


    
    }

    public function store(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'err'=>'',
            

        ];
        $result=$this->home->store($data);
        if($result){
            $this->view('Customer/home',$result);
        }
    }

    




    }

   



  

