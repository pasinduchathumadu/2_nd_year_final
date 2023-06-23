<?php

class M_Cus_manager extends Model{

    protected $table = 'customer_manager';

    protected $table1 = 'total_user';

    public function register($data){
        $result=$this->connection();
        $id = $data['id'];
        $first = $data['first'];
        $last = $data['last'];
        $nic = $data['nic'];
        $email = $data['email'];
      
        $password = $data['password'];

        $sql="select *from $this->table where customer_manager_id ='".$id."'";
        $query = $result->query($sql);

        if($query->num_rows>0){
            $error="This Manager id is already exist!";
            $data=[
                'error'=>$error,
            ];
            return $data;
        }

        $sql="select *from $this->table where email ='".$email."'";
        $query = $result->query($sql);

        if($query->num_rows>0){
            $error="This Email is already exist!";
            $data=[
                'error'=>$error,
            ];
            return $data;
        }
        else{
            $active=1;
            $_SESSION['password']=$password;
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql="insert into $this->table(customer_manager_id,First_name,Last_name,NIC,email,password,status)values('$id','$first','$last','$nic','$email','$hash','$active')";
            $query = $result->query($sql);
            $sql = "insert into $this->table1 (email,password,role,status)values('$email','$hash','staff',1)";
            $query = $result->query($sql);
            $_SESSION['customer_manager_id']=$id;
            $data=[
                'error'=>'',
            ];
            return $data;
        }
    }

}