
<?php
class Addvehicle1 extends Controller
{
    public function __construct(){
        $this->addvehicle1=$this->model('M_Addvehicle1');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->addvehicle1->addvehicle1($data);
        if($result){
            $this->view('Customer/addvehicle1',$result);
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'vno' => trim( $_POST['vno']),
                'vtype' => trim( $_POST['vtype']),
                'ftype' => trim( $_POST['ftype']),
                'phone' => trim( $_POST['phone']),
               
               
        
                'err'=>'',

            ];
            

          $insert= $this->addvehicle1->add($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Customer/Profile');

           }

           else {
          
            $this->view('Customer/Addvehicle1',$insert);
        }
      
                
        }

    }
}