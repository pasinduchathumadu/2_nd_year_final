<?php
class Octane_92 extends Controller{

    public $Octane92;
    public function __construct(){
        $this->Octane92=$this->model('M_octane92');
    }

    public function index(){
        $this->view('Manager/Octane92');
    }

    public function add92(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'arrive_amount'=>trim($_POST['arrive_amount']),
                'eligible_amount'=>trim($_POST['eligible_amount']),
                'err'=>'',

            ];
        }
            if($this->Octane92->add92($data)){
                  //$this->view(Manager/octane);
            }
            //echo "edcs";

    }
}