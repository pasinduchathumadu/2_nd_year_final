<?php
   

class Available extends Controller
{
    public $available;
    public function __construct(){
        $this->available=$this->model('M_Available');
    }


    public function index(){
        $data=[
          

        ];
        $result=$this->available->available($data);
        if($result){
            $this->view('Home/available',$result);
        }


    
    }


    




    }

   



  

