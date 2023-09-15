<?php

class M_dis_manager extends Model{

    protected $table = 'all_manager';

    protected $table1 = 'registered_users';

    public function register($data){
        $result=$this->connection();
        $id = $data['id'];
        $first = $data['first'];
        $last = $data['last'];
        $nic = $data['nic'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];

        $sql="select *from $this->table where manager_id ='".$id."' AND type = 'manager'";
        $query = $result->query($sql);

        if($query->num_rows>0){
            $error="This Manager id is already exist!";
            $data=[
                'error'=>$error,
            ];
            return $data;
        }

        $sql="select *from $this->table1 where email ='".$email."' AND role = 'manager'";
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
            $sql="insert into $this->table(manager_id,email,type,)values('$id','$email','manager')";
            $query = $result->query($sql);
            $sql="insert into $this->table1(email,password,fname,lname,NIC,phone,role,status)values('$email','$hash','$first','$last','$nic','$phone','manager','$active')";
            $query = $result->query($sql);
           
            $_SESSION['distribution_manager_id']=$id;
            $data=[
                'error'=>'',
            ];
            return $data;
        }
    }

}