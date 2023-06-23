<?php
class M_Hours extends Model{
    protected $table = 'working_time';
    public function details(){
        $result = $this->connection();
        $pumper_id = $_SESSION['id'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('y-m-d');
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND Date = '".$date."' LIMIT 50";
        $query = $result->query($sql);
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND Date = '".$date."' LIMIT 50";
        $query1 = $result->query($sql);
        $total=0;
        while($row = $query1->fetch_array()){
            $total += $row['working_hours'];
        }

        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'total'=>$total,
                'error'=>'',
            ];
            return $data;
        }
        else{
            return false;
        }

    }
    public function previous1($data){
        $result = $this->connection();

        $pumper_id = $_SESSION['id'];

        date_default_timezone_set('Asia/Kolkata');
        $from = $data['from'];
        $to = $data['to'];
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND (Date>='".$from."' AND Date<='".$to."')";
        $query = $result->query($sql);
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND (Date>='".$from."' AND Date<='".$to."')";
        $query1 = $result->query($sql);
        $total=0;
        while($row = $query1->fetch_array()){
            $total += $row['working_hours'];
        }

        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'total'=>$total,
                'error'=>'',
            ];
            return $data;
        }
        else{
            $data=[
                'result'=>$query,
                'total'=>$total,
                'error'=>'NO RECORDS',
            ];
            return $data;
        }

    }
}
