<?php

class M_Change_password extends Model
{
    protected $table = 'pumper';

    protected $table1 = 'total_user';

    public function load(){
        $result=$this->connection();
        $pump_id = $_SESSION['id'];
        $sql="select *from $this->table where id = '".$pump_id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $pump_id=$row['id'];
            $email=$row['email'];
            $first=$row['first_name'];
            $last=$row['last_name'];
            $nic = $row['nic'];
            $number = $row['phone_no'];
        }
        $data=[
            'id'=>$pump_id,
            'email'=>$email,
            'nic'=>$nic,
            'number'=>$number,
            'first'=>$first,
            'last'=>$last,
        ];
        return $data;
        
    }
    public function change($data){
        $result=$this->connection();
        $pump_id = $_SESSION['id'];
        $current = $data['current_password'];
        $new = $data['new_password'];
        $confirm = $data['confirm_password'];
        
        $sql="select * from $this->table where id = '".$pump_id."'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $original_password=$row['password'];
            $email = $row['email'];
        }
        $sql="select *from $this->table where id = '".$pump_id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $pump_id=$row['id'];
            $email=$row['email'];
            $first=$row['first_name'];
            $last=$row['last_name'];
            $nic = $row['nic'];
            $number = $row['phone_no'];
        }
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
                    'err'=>$error,
                ];
                return $data;
            
            }
            else{
                if($new==$confirm){
                    $password = password_hash($new,PASSWORD_DEFAULT);
                    $sql="update $this->table set password ='".$password."' where id = '".$pump_id."'";
                    $query=$result->query($sql);
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
                        'err'=>$error,
                    ];
                    return $data;
                  
                }
                else{
                    $error="Password didn't matched!";
                    $data=[
                        'id'=>$pump_id,
                        'email'=>$email,
                        'nic'=>$nic,
                        'number'=>$number,
                        'first'=>$first,
                        'last'=>$last,
                        'err'=>$error,
                    ];
                    return $data;
                   
                }
            }

    }
}