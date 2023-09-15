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
            'logout_error'=>'',
        ];
        $result = $this->order->load($data);
        
        $this->view('Pumper/User',$result);
    }
    public function Non_order(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'no'=>trim($_POST['no']),
              
            ];
        
          
            $result=$this->order->non_order($data);
            if($result['error_non']==''){
               
                $this->view('Pumper/Non_order',$result);
               

            }
            else{
               
                $this->view('Pumper/User',$result);

               
            }
        }

    }

    public function Non_complete(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'full'=>trim($_POST['full']),
                'no'=>trim($_POST['no']),
                'email'=>trim($_POST['email']),
                'vehicle'=>trim($_POST['vehicle']),
                'Fuel_Type'=>trim($_POST['Fuel_Type']),
                'liters'=>trim($_POST['liters']),
            ];
            $result=$this->order->Non_complete($data);
            $this->view('Pumper/Non_order',$result);
           
        }

    }
    public function order_verify(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'order_no'=>trim($_POST['order_id']),
                'date'=>'',
                'time'=>'',
                'error'=>'',
            ];
            $result=$this->order->order_verify($data);
            if($result==3){
                header('location:http://localhost/PETRO/public/Pumper/Order');
            }
            elseif($result==1){

                $data = [
                    'remark' =>0,
                    'logout_error'=>'',
                ];

                $result = $this->order->load($data);

                $this->view('Pumper/User',$result);
            }
            elseif($result==2){
                $data = [
                    'remark' =>-1,
                    'logout_error'=>'',
                ];


                $result = $this->order->load($data);

                $this->view('Pumper/User',$result);

            }
        }
    }
    public function logout_error(){
        $data =[
            'remark'=>1,
            'logout_error'=>1,
        ];
        $result = $this->order->load($data);
        
        $this->view('Pumper/User',$result);

    }
}