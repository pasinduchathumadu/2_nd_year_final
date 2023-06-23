<?php

class M_profile extends Model{

    protected $table = 'all_manager';

    public function view_manager($data){
        $result = $this->connection();
        $manager_ID = $data['manager_ID'];
        $sql="select * from $this->table inner join registered_users on all_manager.email = registered_users.email where $this->table.manager_id ='".$manager_ID."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $id= $row['manager_id'];
                $first_name = $row['fname'];
                $last_name = $row['lname'];
                $nic = $row['NIC'];
                $email  = $row['email'];
                $phone_no = $row['phone'];
            }
            $arr =array(
                'id'=> $id,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'nic' => $nic,
                'email'=>$email,
                'phone_no'=> $phone_no,
                'loading'=>'1',
                'err'=>'',
            );
            return $arr;

        }
        else{
            return false;
        }
    }
}