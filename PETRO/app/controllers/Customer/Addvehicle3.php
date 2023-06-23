
<?php
class Addvehicle3 extends Controller
{
    public function __construct(){
        $this->addvehicle3=$this->model('M_Addvehicle3');
        
    }
    
    public function index(){
        $data=[
            'id'=>$_SESSION['CUS_id'],
            'email'=>'',

        ];
        $result=$this->addvehicle3->addvehicle3($data);
        if($result){
            $this->view('Customer/addvehicle3',$result);
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST=filter_input_array(INPUT_POST,FILTER_UNSAFE_RAW);
            $id= $_SESSION['CUS_id'];

            $data=[

                'vno2' => trim( $_POST['vno2']),
                'vtype2' => trim( $_POST['vtype2']),
                'ftype2' => trim( $_POST['ftype2']),
                'phone' => trim( $_POST['phone']),
               
               
        
                'err'=>'',

            ];
            

          $insert= $this->addvehicle3->add($data);
        if($insert==1){
              header('location:http://localhost/PETRO/public/Customer/Profile');

           }

           else {
          
            $this->view('Customer/Addvehicle3',$insert);
        }
      
                
        }

    }
}