<?php
class Store extends Controller
{
    public $store;
    public function __construct(){
        $this->store=$this->model('M_Store');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'err'=>'',
            

        ];
        $result=$this->store->store($data);
        if($result){
            $this->view('Customer/store',$result);
        }
    }
    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);

            $data=[
                'p_id'=>trim($_POST['p_id']),
                
                
            ];
        
            $_SESSION['p_id']=$data['p_id'];
            
           
               
                header('location:http://localhost/PETRO/public/Customer/Productdetails');
              
            

    }

    }
}


