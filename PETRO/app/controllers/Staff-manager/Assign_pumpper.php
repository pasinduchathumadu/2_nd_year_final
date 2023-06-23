<?php

class Assign_pumpper extends Controller
{
    public $order;
    public $error;
    
    public function __construct()
    {
        $this->order=$this->model('M_assign_pumpper');
    }

    public function index()
    {
        
        $result = $this->order->assign_pumpper();
        if($result){
            $this->view('Staff-manager/Assign_pumpper',$result);
        }
        else{
            $this->view('Staff-manager/Assign_pumpper',);
        }
    }
    
    public function assign(){
        //get user data and asign in to variables (escape special character)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $editdata=[
                'pumperMashine'=>trim($_POST['pumperMashine']),
                'pumperid'=>trim($_POST['pumperid']),
                'error'=>"",
            ];
            
            $result = $this->order->assign($editdata);

            if($result == "assign error"){
                $result = $this->order->assign_pumpper();
                $result['error'] = "Oops! Already a pumper work on this machine";
                $this->view('Staff-manager/Assign_pumpper',$result);

            }elseif($result == "remove error"){
                $result = $this->order->assign_pumpper();
                $result['error'] = "Oops! This Machine hasn't working a pumper";
                $this->view('Staff-manager/Assign_pumpper',$result);
            }
            
            else{
                //redirect to the email's page
                header('location:http://localhost/PETRO/Public/Staff-manager/Email?Mashine='.$editdata["pumperMashine"].'&pumperid='.$editdata["pumperid"].'&type='.$result.'');
                
            }
        }

    }

} 