<?php

use LDAP\Result;

class View_pumper_Profile extends Controller
{
    public $Profile;
    public function __construct(){
        $this->Profile=$this->model('M_View_pumper_Profile');
    }
    public function index(){

        $Pump_ID = $_GET['pump_id'];
        $result=$this->Profile->profile($Pump_ID);
        
        if($result['status'] == "0"){
            $result['status'] = "Suspend Pumper";
        }else{
            $result['status'] = "Active Pumper";
        }

        if($result){
            $this->view('Staff-manager/view_pumper_profile',$result);
        }
        
    }

    
}


