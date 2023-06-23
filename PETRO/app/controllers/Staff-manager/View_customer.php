
<?php

class View_customer extends Controller
{
    public $customer;
    public function __construct()
    {
        $this->customer=$this->model('M_view_customer');
    }

    public function index()
    {
        
        $result = $this->customer->customer_list();

        if($result){
            $this->view('Staff-manager/view_customer',$result);

        }
        else{
            $this->view('Staff-manager/view_customer',);
        }

    
    }


    public function remove_customers()
    {
        $cus_Email = $_GET['cus_email'];
        $result=$this->customer->cust_remove($cus_Email);
        $data = $this->customer->customer_list();
        if($result){
            $data['success'] = "Successfully Customer Suspended";
        }else{
            $data['error'] = "Failed to Suspend Customer";
        }
        $this->view('Staff-manager/view_customer',$data);
    }

    public function add_customers()
    {
        $cus_Email = $_GET['cus_email'];
        $result=$this->customer->cust_add($cus_Email);
        $data = $this->customer->customer_list();
        if($result){
            $data['success'] = "Successfully Customer Activated";
        }else{
            $data['error'] = "Failed to Activate Customer";
        }
        $this->view('Staff-manager/view_customer',$data);
    }

}