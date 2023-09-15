<?php

class M_view_pumper extends Model{

    protected $table = 'pumper';

    public function pumper_list(){
        $result = $this->connection();
        
        $sql="select * from pumper inner join registered_users on pumper.email = registered_users.email";

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

    public function pump_remove($email){
        $result = $this->connection();

        $sql="SELECT * from `pumper` WHERE `email` = '$email' AND `status` = 'assigned';";
        $query = $result->query($sql);

        if($query->num_rows>0){
            return 'assigned';
        }

        $sql="UPDATE `registered_users` SET `status` = 0 WHERE `email` = '$email';";
        $query = $result->query($sql);

        $sql="UPDATE `pumper` SET `status` = '0' WHERE `email` = '$email';";
        $query = $result->query($sql);
       
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }

    public function pump_add($email){
        $result = $this->connection();
        
        $sql="UPDATE `registered_users` SET `status` = 1 WHERE `email` = '$email';";
        $query = $result->query($sql);

        $sql="UPDATE `pumper` SET `status` = 'not assigned' WHERE `email` = '$email';";
        $query = $result->query($sql);

        if($query){
            return true;
        }
        else{
            return false;
        }
    }
    
}