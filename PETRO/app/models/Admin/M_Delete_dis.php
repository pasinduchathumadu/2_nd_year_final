<?php

class M_Delete_dis extends Model{
    protected $table='distribution_manager';
    public function records($data){
        $id = $data['id'];
        $active=0;
        $result = $this->connection();
        $sql="select *from $this->table where distribution_manager_id = '".$id."' and status =1";
        $query=$result->query($sql);
        if($query->num_rows>0){
            $sql="update $this->table set status = '".$active."' where distribution_manager_id='".$id."'";
            $query=$result->query($sql);
            return true;
        }
        else{
            return false;
        }
    }
}