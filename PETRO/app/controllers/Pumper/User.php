<?php

class User extends Controller
{
    public $order;
    public function __construct()
    {
        $this->order=$this->model('M_User');
    }

    public function index()
    {
        $data = [
            'remark'=>1,
        ];
        $result = $this->order->load($data);
        
        $this->view('Pumper/User',$result);
    }
    public function order_verify(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'order_no'=>trim($_POST['order_id']),
                'date'=>'',
                'time'=>'',
                'err'=>'',
            ];
            $result=$this->order->order_verify($data);
            if($result==3){
                header('location:http://localhost/PETRO/public/Pumper/Order');
            }
            elseif($result==1){

                $data = [
                    'remark' =>0,
                ];

                $result = $this->order->load($data);

                $this->view('Pumper/User',$result);
            }
            elseif($result==2){
                $data = [
                    'remark' =>-1,
                ];

                $result = $this->order->load($data);

                $this->view('Pumper/User',$result);

            }
        }
    }
}