<?php

class M_final extends Model{
    protected $table = 'registered_users';

   

  
    public function check($data){
        $Email = $data['Email'];
        $result = $this->connection();
        if($data['new']==$data['confirm']){
            $password = password_hash($data['new'],PASSWORD_DEFAULT);
            $sql="update $this->table set password ='".$password."' where Email = '".$Email."'";
            $query=$result->query($sql);
            return true;
        }
        else{
            return false;
        }

        
      

        }
      
}