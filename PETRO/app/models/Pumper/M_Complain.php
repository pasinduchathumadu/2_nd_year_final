<?php

class M_Complain extends Model{

    protected $table="complain";
    public function load($data){
        $result = $this->connection();
        $subject=$data['subject'];
        $pumper_id = $_SESSION['id'];
        // insert new complain into the complain table
        $sql="Insert INTO $this->table (user_id,complain)VALUES('$pumper_id','$subject')";
        $query=$result->query($sql);

        
    }
    public function get(){
        $result = $this->connection();
        $pumper_id = $_SESSION['id'];
        // obtain data from complain table
        $sql="select *from $this->table where user_id = '".$pumper_id."'";
        $query=$result->query($sql);
        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'error'=>'',
            ];
            return $data;
        }
        else{
            $data=[
                'result'=>$query,
                'error'=>'No Records...!',
            ];
            return $data;

        }

    }
}