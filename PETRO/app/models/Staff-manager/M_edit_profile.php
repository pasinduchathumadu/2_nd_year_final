<?php

class M_edit_profile extends Model{

    protected $table = 'all_manager';

    public function edit_manager($data){
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
                'error'=>'',
            );
            return $arr;

        }
        else{
            return false;
        }
    }

    
    public function submit_edit($data){
        $result = $this->connection();
        
        //check both password are match
        if($data['password'] != $data['editRetype_password']){
            return false;
            
        }else{
            //update user record given data to the data base table
            if(!empty($data['password'])){
                $hash = password_hash($data['password'],PASSWORD_DEFAULT);
                $insert = "Update registered_users set fname = '".$data['first_name']."', lname = '".$data['last_name']."', NIC  = '".$data['nic']."', phone = '".$data['phone_no']."', password = '".$hash."' where email  = '".$data['email']."'";
            }else{
                $insert = "Update registered_users set fname = '".$data['first_name']."', lname = '".$data['last_name']."', NIC  = '".$data['nic']."', phone = '".$data['phone_no']."' where email  = '".$data['email']."'";
            }
            $query = $result->query($insert);
            //redirect to the staff manager's page
            return true;
            
        };
        
    
    }    
    
}