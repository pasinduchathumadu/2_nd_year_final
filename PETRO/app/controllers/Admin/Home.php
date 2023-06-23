
<?php
class Home extends Controller{
    public $Update;

    public $Home;
    public function __construct(){
        $this->Home=$this->model('M_Home');
    }

    public function index(){

        $result=($this->Home->update_fuel());
           
         $this->view('Admin/home',$result);
           
    } 
}