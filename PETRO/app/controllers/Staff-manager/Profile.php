
<?php

class Profile extends Controller
{
    public $order;
    public function __construct()
    {
        $this->order=$this->model('M_profile');
    }

    public function index()
    {
        $data=[
            'manager_ID'=>$_SESSION['manager_ID'],
        ];
        
        $result = $this->order->view_manager($data);
        
        if($result){
            $this->view('Staff-manager/profile',$result);

        }
        else{
            $this->view('Staff-manager/profile');
        }
    }

}