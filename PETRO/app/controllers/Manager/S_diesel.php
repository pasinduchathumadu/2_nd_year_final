<?php
class S_diesel extends Controller{

    
    public function __construct(){
        $this->Sdiesel=$this->model('M_Sdiesel');
    }

    public function index(){
        $this->view('Manager/Sdiesel');
    }

    public function addsdl(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'arrive_amount'=>trim($_POST['arrive_amount']),
                'eligible_amount'=>trim($_POST['eligible_amount']),
                'err'=>'',

            ];
        }
            if($this->Sdiesel->addsdl($data)){
              echo "added";//  $this->view(Manager/octane);
            }

    }
}