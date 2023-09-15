<?php

class M_Email extends Model{
    protected $table='all_manager';

    protected $table1 = 'registered_users';
    public function details(){
        $id=$_SESSION['customer_manager_id'];
        $result = $this->connection();
        $sql="select *from $this->table where manager_id='".$id."' AND type = 'staff'";
        $query=$result->query($sql);
        while($row = $query->fetch_assoc()){
            $email=$row['email'];
          
        }
        $sql="select *from $this->table1 where email='".$email."' AND role = 'staff'";
        $query=$result->query($sql);
        while($row = $query->fetch_assoc()){
            $first=$row['fname'];
            $last=$row['lname'];
            
          
        }


       
        $data=[
            'email'=>$email,
            'first'=>$first,
            'last'=>$last,
        ];
        return $data;
    }
}