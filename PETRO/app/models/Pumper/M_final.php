<?php

class M_final extends Model{
    protected $table = 'total_user';

    protected $table1 = 'user_form';

    protected $table2 = 'distribution_manager';

    protected $table3 = 'customer_manager';

    protected $table4 = 'pumper';
    public function check($data){
        $Email = $data['Email'];
        $result = $this->connection();

        $sql = "select *from $this->table1 where Email ='".$Email."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            if($data['new']==$data['confirm']){
                $password = password_hash($data['new'],PASSWORD_DEFAULT);
                $sql="update $this->table set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                $sql="update $this->table1 set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                return true;
            }
            else{
                return false;
            }

        }
        $sql = "select *from $this->table2 where Email ='".$Email."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            if($data['new']==$data['confirm']){
                $password = password_hash($data['new'],PASSWORD_DEFAULT);
                $sql="update $this->table set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                $sql="update $this->table2 set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                return true;
            }
            else{
                return false;
            }
            

        }
        $sql = "select *from $this->table3 where Email ='".$Email."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            if($data['new']==$data['confirm']){
                $password = password_hash($data['new'],PASSWORD_DEFAULT);
                $sql="update $this->table set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                $sql="update $this->table3 set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                return true;
            }
            else{
                return false;
            }

        }
        $sql = "select *from $this->table4 where Email ='".$Email."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            if($data['new']==$data['confirm']){
                $password = password_hash($data['new'],PASSWORD_DEFAULT);
                $sql="update $this->table set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                $sql="update $this->table4 set password ='".$password."' where Email = '".$Email."'";
                $query=$result->query($sql);
                return true;
            }
            else{
                return false;
            }

        }
        
        
    }
}