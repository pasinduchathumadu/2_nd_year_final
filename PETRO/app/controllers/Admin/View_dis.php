<?php

class View_dis extends Controller
{
    public $view;
    public function __construct(){
        $this->view=$this->model('M_View_dis');
    }
    public function index(){
        $result=$this->view->records();
        if($result){
            $this->view('Admin/view_dis',$result);
        }
        else
        {
            $data=[
                'error'=>"No Records!!",
            ];
            $this->view('Admin/view_dis',$data);
        }
    }
    public function remove(){
       
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=[
                'id'=>trim($_POST['distribution_manager_id']),
                
            ];
            $this->view->remove($data);
            header('location:http://localhost/PETRO/public/Admin/View_dis');
          
           
        
        }

    }
}