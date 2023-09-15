<?php

class M_Change_password extends Model
{
    protected $table = 'pumper';

    protected $table1 = 'registered_users';

    public function load(){
        $result=$this->connection();
        $pump_id = $_SESSION['id'];

        // get the pumper login email
        $sql="select *from $this->table where id = '".$pump_id."'";
        $query=$result->query($sql);

        while($row = $query->fetch_array()){
            $email=$row['email'];
        }
        // map into the regisstered user table
        $sql="select *from $this->table1 where email = '".$email."'";
        $query=$result->query($sql);

        while($row = $query->fetch_array()){
            $nic = $row['NIC'];
            $first = $row['fname'];
            $last = $row['lname'];
            $number = $row['phone'];
        }
        // get the profile details
        $data=[
            'id'=>$pump_id,
            'email'=>$email,
            'nic'=>$nic,
            'number'=>$number,
            'first'=>$first,
            'last'=>$last,
            'error'=>'',
            'success'=>'',
        ];
        return $data;
        
    }
    public function change($data){
        $result=$this->connection();
        $pump_id = $_SESSION['id'];
       
        $current = $data['current_password'];
         // entered password
        $new = $data['new_password'];
        $confirm = $data['confirm_password'];
        
        $sql="select * from $this->table where id = '".$pump_id."'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $email = $row['email'];
        }
        $sql="select *from $this->table1 where email = '".$email."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
          
       
            $first=$row['fname'];
            $last=$row['lname'];
            $nic = $row['NIC'];
            $number = $row['phone'];
            $original_password=$row['password'];
        }
        // password confirmation
            $verify=password_verify($current,$original_password);
            if(!$verify){
                $error="Existing Password is not match!";
                $data=[
                    'id'=>$pump_id,
                    'email'=>$email,
                    'nic'=>$nic,
                    'number'=>$number,
                    'first'=>$first,
                    'last'=>$last,
                    'error'=>$error,
                    'success'=>'',
                ];
                return $data;
            
            }
            else{
                // current password is match next
                if($new==$confirm){
                    // hash the password
                    $password = password_hash($new,PASSWORD_DEFAULT);
                   
                    $sql="update $this->table1 set password ='".$password."' where email = '".$email."'";
                    $query=$result->query($sql);
                    $error="Successfully Changed the password";
                  
                    $data=[
                        'id'=>$pump_id,
                        'email'=>$email,
                        'nic'=>$nic,
                        'number'=>$number,
                        'first'=>$first,
                        'last'=>$last,
                        'success'=>$error,
                        'error'=>'',
                    ];
                    return $data;
                  
                }
                else{
                    // error occured
                    $error="Password didn't matched!";
                    $data=[
                        'id'=>$pump_id,
                        'email'=>$email,
                        'nic'=>$nic,
                        'number'=>$number,
                        'first'=>$first,
                        'last'=>$last,
                        'error'=>$error,
                        'success'=>'',
                    ];
                    return $data;
                   
                }
            }

    }
}