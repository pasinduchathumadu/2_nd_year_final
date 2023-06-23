
<?php
class Updatevehicle2 extends Controller{
public $Updatevehicle2;

    public function __construct(){
    
        $this->updatevehicle2=$this->model('M_Updatevehicle2');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->updatevehicle2->updatevehicle2($data);
        if($result){
            $this->view('Customer/updatevehicle2',$result);
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
           
            $result = $this->updatevehicle2->add($data);
            if($result){
                header('location:http://localhost/PETRO/public/Customer/Profile');

            }
        }


    }




}