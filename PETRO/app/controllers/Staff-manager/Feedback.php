<?php

class Feedback extends Controller
{
    public $feedback;
    public function __construct()
    {
        $this->feedback=$this->model('M_feedback');
    }

    public function index()
    {
        
        $result = $this->feedback->view_feedback();

        if($result){
            $this->view('Staff-manager/feedback',$result);

        }
        else{
            $this->view('Staff-manager/feedback',);
        }
    }

}