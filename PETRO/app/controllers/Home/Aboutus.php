<?php
   

class Aboutus extends Controller
{
    public $aboutus;
    public function __construct(){
        $this->aboutus=$this->model('M_Aboutus');
    }


    public function index(){
        $this->view('Home/aboutus');


    
    }


    




    }

   



  

