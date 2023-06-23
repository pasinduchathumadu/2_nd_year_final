<?php

class M_view_customer extends Model{

    protected $table = 'user_form';

    public function customer_list(){
        $result = $this->connection();
        $sql="select * from user_form inner join registered_users on user_form.email = registered_users.email";

        $query = $result->query($sql);
    
        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'error'=>'',
                'success'=>'',
            ];
            return $data;
        }
        else{
            return false;
        }
    }


    public function cust_remove($email){
        $result = $this->connection();
        
        $sql="UPDATE `registered_users` SET `status` = '0' WHERE `email` = '$email';";

        $query = $result->query($sql);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }

    public function cust_add($email){
        $result = $this->connection();
        
        $sql="UPDATE `registered_users` SET `status` = '1' WHERE `email` = '$email';";

        $query = $result->query($sql);
        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    
}