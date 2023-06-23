
<?php
class Updatevehicle1 extends Controller{
public $Updatevehicle1;

    public function __construct(){
    
        $this->updatevehicle1=$this->model('M_Updatevehicle1');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->updatevehicle1->updatevehicle1($data);
        if($result){
            $this->view('Customer/updatevehicle1',$result);
        }
    }



    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['id'];

            $data=[
                'vno' => trim($_POST['vno']),
                'vtype'=>trim($_POST['vtype']),
                'ftype'=>trim($_POST['ftype']),
                'phone'=>trim($_POST['phone']),
                'err'=>'',

            ];
           
            $result = $this->updatevehicle1->add($data);
            if($result){
                header('location:http://localhost/PETRO/public/Customer/Profile');

            }
        }


    }




}