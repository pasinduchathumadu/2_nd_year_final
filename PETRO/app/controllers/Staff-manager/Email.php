<?php

class Email extends Controller{
    public $send;
    public function __construct(){
        
        $this->send=$this->model('M_email');
    }
    public function index(){
        $MashineID=$_GET['Mashine'];
        $pumperid=$_GET['pumperid'];
        $type=$_GET['type'];

        if($type != 1){
            $pumperid = $type;
            $type = 0;  //type = 0 mean this email for remove
        }

        $data=[
            'MashineID'=>$MashineID,
            'pumperid'=>$pumperid,
            'type'=>$type,

        ];

        $result=$this->send->records($data);
        if($result['error']==0){
            $error="Message Sent Successfully!";
            $data = [
                'first'=>$result['first'],
                'last'=>$result['last'],
                'error'=>$error,

            ];
            header('location:http://localhost/PETRO/public/Staff-manager/Assign_pumpper');
        }
        else{
            $error="THIS MESSAGE IS NOT SEND!";
            $data = [
                'first'=>$result['first'],
                'last'=>$result['last'],
                'error'=>$error,

            ];
            header('location:http://localhost/PETRO/public/Staff-manager/Assign_pumpper');
        }

     }
}