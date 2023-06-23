<?php
class M_Complain extends Model{
    protected $table='pumper_complain';

    public function complain(){
        $result=$this->connection();
        $sql="select *from $this->table where status = 'Pending'";
        $query=$result->query($sql);
        if($query->num_rows>0){
           
            $data=[
                'result'=>$query,
                'empty'=>1,
            ];
            return $data;
        }
        else{
            $data=[
                'empty'=>0,
            ];
            return $data;
        }

    }
    public function register($data){
        $result=$this->connection();
        $response=$data['response'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $id=$data['id'];
        $sql="UPDATE $this->table SET response='".$response."',status='Completed',res_date='".$date."' WHERE complain_ID='".$id."'";
        $query=$result->query($sql);

    }
}