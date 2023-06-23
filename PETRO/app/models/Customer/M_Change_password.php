<?php

class M_Change_password extends Model
{
    protected $table = 'user_form';

    protected $table1 = 'registered_users';

    public function load(){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
        
        $sql="select *from $this->table where id = '".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $id=$row['id'];
            $email=$row['email'];
         
            
         
        }
        $data=[
            'id'=>$id,
            'email'=>$email,
            'fname'=>$fname,
            
            
        ];
        return $data;
        
    }
    public function change($data){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];


        $current = $data['current_password'];
        $new = $data['new_password'];
        $confirm = $data['confirm_password'];

        $sql="select * from $this->table where id = '".$id."'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            
            $email = $row['email'];
        }
        
        $sql="select * from $this->table1 where email = '".$email."'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $original_password=$row['password'];
            $email = $row['email'];
        }
    
            $verify=password_verify($current,$original_password);
            if(!$verify){
                $error="Existing Password is not match!";
                $data=[
                    'id'=>$id,
                    'email'=>$email,
                    'fname'=>$fname,
                    
                  
                    'err'=>$error,
                ];
                return $data;
            
            }
            else{
                if($new==$confirm){
                    $password = password_hash($new,PASSWORD_DEFAULT);
                 
                    $sql="update $this->table1 set password ='".$password."' where email = '".$email."'";
                    $query=$result->query($sql);
                    $error="Successfully Changed the password";
                  
                    $data=[
                        'id'=>$id,
                        'email'=>$email,
                        'fname'=>$fname,
                        
                      
                        'err'=>$error,
                    ];
                    return $data;
                  
                }
                else{
                    $error="Password didn't matched!";
                    $data=[
                        'id'=>$id,
                        'email'=>$email,
                        'fname'=>$fname,
                        
                     
                        'err'=>$error,
                    ];
                    return $data;
                   
                }
            }

    }
}