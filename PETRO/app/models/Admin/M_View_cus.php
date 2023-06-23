<?php

class M_View_cus extends Model
{
    protected $table='customer_manager';

    public function records(){
        $result=$this->connection();
        $sql="select *from $this->table where status = 1";
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
        $ID=$data['id'];
        $result=$this->connection();

        $sql="Delete from $this->table where customer_manager_id='".$ID."'";
        $query=$result->query($sql);

    }
}