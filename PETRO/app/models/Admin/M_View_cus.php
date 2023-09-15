<?php

class M_View_cus extends Model
{
    protected $table='registered_users';

    protected $table1 = 'all_manager';

    public function records(){
        $result=$this->connection();
        $sql="select *from $this->table where role = 'staff' AND status = 1";
        $query=$result->query($sql);
        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'error'=>'',
            ];
            return $data;
        }
        else{
            return false;
        }
    }
    public function remove($data){
        $email=$data['email'];
        $result=$this->connection();


        $sql="UPDATE $this->table SET status = 0 where email='".$email."' AND role = 'staff'";
        $query=$result->query($sql);

    }
}