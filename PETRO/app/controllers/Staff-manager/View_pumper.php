
<?php

class View_pumper extends Controller
{
    public $pumper;
    public function __construct()
    {
        $this->pumper=$this->model('M_view_pumper');
    }

    public function index()
    {
        
        $result = $this->pumper->pumper_list();

        if($result){
            $this->view('Staff-manager/View_pumper',$result);

        }
        else{
            $this->view('Staff-manager/View_pumper',);
        }
    }

    public function remove_pumper()
    {
        $pump_Email = $_GET['pump_email'];
        $result=$this->pumper->pump_remove($pump_Email);
        $data = $this->pumper->pumper_list();
        
        if($result == 'assigned'){
            $data['error'] = "Selected Pumper Assigned to a Machine";
        }
        elseif($result == '1'){
            
            $data['error'] = '';
            $data['success'] = "Successfully Pumper Suspended";
            
            
        }else{

            $data['error'] = "Failed to Suspend Pumper";
        }
        $this->view('Staff-manager/View_pumper',$data);
       
    }

    public function add_pumper()
    {
        $cus_Email = $_GET['pump_email'];
        $result=$this->pumper->pump_add($cus_Email);
        $data = $this->pumper->pumper_list();

        if($result){
            $data['success'] = "Successfully Pumper Made Active";
        }else{
            $data['error'] = "Failed to Activate Pumper";
        }
        $this->view('Staff-manager/View_pumper',$data);
    }

}