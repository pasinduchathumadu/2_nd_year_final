<?php

class Terms extends Controller{
   
    public function __construct(){
        $this->terms=$this->model('M_Terms');
    }

    public function index(){
        $this->view('Customer/Terms');
    }


}