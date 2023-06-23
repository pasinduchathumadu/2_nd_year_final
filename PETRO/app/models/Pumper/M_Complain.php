<?php

class M_Complain extends Model{

    protected $table="pumper_complain";
    public function load($data){
        $result = $this->connection();
        $date = date('y-m-d');
        $email=$data['email'];
        $concern=$data['concern'];
        $subject=$data['subject'];
        $pumper_id = $_SESSION['id'];
        $sql="Insert INTO $this->table (Pumper_id,Date,text,concern,email)VALUES('$pumper_id','$date','$subject','$concern','$email')";
        $query=$result->query($sql);

        
    }
    public function get(){
        $result = $this->connection();
        $pumper_id = $_SESSION['id'];
        $sql="select *from $this->table where Pumper_id = '".$pumper_id."'";
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