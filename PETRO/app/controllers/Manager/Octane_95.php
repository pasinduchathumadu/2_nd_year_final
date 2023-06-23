<?php
class Octane_95 extends Controller{
    public $Octane95;
    public function __construct(){
        $this->Octane95=$this->model('M_octane95');
    }

    public function index(){
        $this->view('Manager/Octane95');
    }

    public function add95(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'arrive_amount'=>trim($_POST['arrive_amount']),
                'eligible_amount'=>trim($_POST['eligible_amount']),
                'err'=>'',

            ];
        }
            if($this->Octane95->add95($data)){
              echo"Succesful";//  $this->view(Manager/octane);
            }

    }
}