
<?php
class Addvehicle2 extends Controller
{
    public function __construct(){
        $this->addvehicle2=$this->model('M_Addvehicle2');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->addvehicle2->addvehicle2($data);
        if($result){
            $this->view('Customer/addvehicle2',$result);
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'vno1' => trim( $_POST['vno1']),
                'vtype1' => trim( $_POST['vtype1']),
                'ftype1' => trim( $_POST['ftype1']),
                'phone' => trim( $_POST['phone']),
               
               
        
                'err'=>'',

            ];
            

          $insert= $this->addvehicle2->add($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Customer/Profile');

           }

           else {
          
            $this->view('Customer/Addvehicle2',$insert);
        }
      
                
        }

    }
}