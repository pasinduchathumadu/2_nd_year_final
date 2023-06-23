<?php
class A_diesel extends Controller{
    public function __construct(){
        $this->Adiesel=$this->model('M_Adiesel');
    }

    public function index(){
        $this->view('Manager/Adiesel');
    }

    public function addadl(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'arrive_amount'=>trim($_POST['arrive_amount']),
                'eligible_amount'=>trim($_POST['eligible_amount']),
                'err'=>'',

            ];
        }
            if($this->Adiesel->addadl($data)){
              echo "Done";//  $this->view(Manager/octane);
            }

    }
}