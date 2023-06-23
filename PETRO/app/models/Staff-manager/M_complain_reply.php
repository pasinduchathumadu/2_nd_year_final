<?php
class M_complain_reply extends Model{
    protected $table='complain';

    public function complain($data){
        $result=$this->connection();
        $sql="select * from $this->table where com_id  = '$data'";
        $query=$result->query($sql);
        $row = $query->fetch_array();
        return $row;

    }
    public function register($data){
        $result=$this->connection();
        $response=$data['response'];
        $status=$data['status'];
        $id=$data['com_id'];
        
    
        if ($response){
            $sql="UPDATE $this->table SET response='".$response."',status='Replied' WHERE com_id ='".$id."'"; 
        }
        else{
            $sql="UPDATE $this->table SET status='".$status."' WHERE com_id ='".$id."'"; 
        }
        $query=$result->query($sql);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
        
    }
}