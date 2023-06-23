
<?php
class Updatevehicle3 extends Controller{
public $Updatevehicle3;

    public function __construct(){
    
        $this->updatevehicle3=$this->model('M_Updatevehicle3');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->updatevehicle3->updatevehicle3($data);
        if($result){
            $this->view('Customer/updatevehicle3',$result);
        }
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['id'];

            $data=[
                'vno2' => trim($_POST['vno2']),
                'vtype2'=>trim($_POST['vtype2']),
                'ftype2'=>trim($_POST['ftype2']),
                'phone'=>trim($_POST['phone']),
                'err'=>'',

            ];
           
            $result = $this->updatevehicle3->add($data);
            if($result){
                header('location:http://localhost/PETRO/public/Customer/Profile');

            }
        }


    }




}