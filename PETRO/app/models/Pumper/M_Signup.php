<?php

class M_Signup extends Model
{
    protected $table='pumper';

    protected $table1 ='total_user';
    public function pumper_register($data){
        $conect = $this->connection();
        $pumper_id  =$data['pumper_id'];
        $Email      =$data['Email'];
        $First_name = $data['First_name'];
        $Last_name  = $data['Last_name'];
        $contact = $data['contact'];
        $gender = $data['gender'];
        $nic = $data['nic'];
        $Password   = $data['password'];
        $confirm_password=$data['confirm_password'];
  
        $sql="select * from $this->table where Email='".$Email."'";
        $result=$conect->query($sql);
  
        if($result->num_rows>0)
        {
          $error_message="This Email is Already Exist!";
          return $error_message;
        }
        else
        {
          if($confirm_password==$Password){
            $active = 1;
            $hash_password = password_hash($Password,PASSWORD_DEFAULT);
            $sql="insert into $this->table (id,first_name,last_name,nic,phone_no,gender,email,password,status)values('$pumper_id','$First_name','$Last_name','$nic','$contact','$gender','$Email','$hash_password','$active')";
            $result=$conect->query($sql);
            $sql = "insert into $this->table1 (email,password,role,status)values('$Email','$hash_password','pumper',1)";
            $result = $conect->query($sql);
          
            $error_message="";
            return $error_message;
          }
          else
          {
            $error_message="Password didn't matched!";
            return $error_message;
          }
  
        }
      }
}