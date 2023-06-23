<?php

class Profile extends Controller
{
    public function __construct(){
        $this->profile=$this->model('M_Profile');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->profile->profile($data);
        if($result){
            $this->view('Customer/profile',$result);
        }
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['id'];

            $data=[

                'delete' => trim( $_POST['delete']),
             
               
               
        
                'err'=>'',

            ];
           

          $insert= $this->profile->add($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Home/Home');

           }
           else{
           
            $this->view('Home/Home',$data);

           }
                
        }

    }
    }


