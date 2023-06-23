<?php

class Profileedit extends Controller
{
    public function __construct(){
        $this->profileedit=$this->model('M_Profileedit');
    }
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            

        ];
        $result=$this->profileedit->profileedit($data);
        if($result){
            $this->view('Customer/profileedit',$result);
        }
    }

    
    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[
                'fname' => trim($_POST['fname']),
                'lname'=>trim($_POST['lname']),
                'phone'=>trim($_POST['phone']),
                'email'=>trim($_POST['email']),
         
                'err'=>'',

            ];
           
            $insert= $this->profileedit->add($data);
    if($insert==1){
          header('location:http://localhost/PETRO/public/Customer/Profileedit');

       }


       else {
      
        $this->view('Customer/Profileedit',$insert);
    }
  
            
    }


    }


        

 

}

    


