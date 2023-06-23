<?php

class Pendingstore extends Controller
{
    public function __construct(){
        $this->pendingstore=$this->model('M_Pendingstore');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'error'=>'',
        ];
        $result=($this->pendingstore->pendingstore($data));
        if($result){
            $this->view('Customer/pendingstore',$result);
        }
        else{
            $data['error']="No Records";
            $this->view('Customer/pendingstore',$data);
        }
    }


    public function remove(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $data=[
                'Oid'=>trim($_POST['Oid']),
                'amount'=>trim($_POST['amount']),
                'ftype'=>trim($_POST['ftype']),
            ];
            $this->pendingstore->remove($data);
            header('location:http://localhost/PETRO/public/Customer/Pendingstore');



    }
}
}