<?php

class M_View_pumper_Profile extends Model
{
    protected $table = 'pumper';    // table for pumper

    public function profile($data){
    

        $id = $data;
        $result=$this->connection();
        $sql="select * from pumper inner join registered_users on pumper.email = registered_users.email where id='".$id."'";

        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $email= $row['email'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $NIC = $row['NIC'];
            $phone = $row['phone'];
            $id  = $row['id'];
            $status = $row['status'];
        }

        $arr=array(
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
            'lname'=>$lname,
            'NIC'=>$NIC,
            'phone'=> $phone,
            'status'=> $status,
            
        );
        return $arr;
              
            }
           


}
          
    






