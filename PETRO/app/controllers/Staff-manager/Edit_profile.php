
<?php

class Edit_profile extends Controller
{
    public $order;
    public function __construct()
    {
        $this->order=$this->model('M_edit_profile');
    }

    public function index()
    {
        $data=[
            'manager_ID'=>$_SESSION['manager_ID'],
        ];
        
        $result = $this->order->edit_manager($data);

        if($result){
            $this->view('Staff-manager/Edit_profile',$result);

        }
        else{
            $this->view('Staff-manager/Edit_profile',$data);
        }
    }

    public function submit_edit(){
        //get user data and asign in to variables (escape special character)
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $editdata=[
                'first_name'=>trim($_POST['firstName']),
                'last_name'=>trim($_POST['lastName']),
                'phone_no'=>trim($_POST['phoneNumber']),
                'nic'=>trim($_POST['nic']),
                'email'=>trim($_POST['email']),
                'password'=>trim($_POST['password']),
                'editRetype_password'=>trim($_POST['retype_password']),
                'error'=>'',
                'success'=>'',

            ];
            
            $result = $this->order->submit_edit($editdata);
            
            //succes massage
            if($result == 1){
                $editdata['success']="Successfully Changes Saved";
                $this->view('Staff-manager/Edit_profile',$editdata);
    
            }
            //both passwords not match
            elseif($result == 0){
                $editdata['error']="Password not matched";
                $this->view('Staff-manager/Edit_profile',$editdata);
            
            //weak password
            }else{
                $editdata['error']="Please Use Strong Password";
                $this->view('Staff-manager/Edit_profile',$editdata);
            }
        }

    }

}