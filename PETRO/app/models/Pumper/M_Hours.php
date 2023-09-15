<?php
class M_Hours extends Model{
    protected $table = 'working_time';

    protected $table1 = 'ot';
    public function details(){
        $result = $this->connection();
        $pumper_id = $_SESSION['id'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('y-m-d');
        // get the data related to the current date
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND Date = '".$date."'";
        $query = $result->query($sql);
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND Date = '".$date."' ";
        $query1 = $result->query($sql);
        $total=0;
        while($row = $query1->fetch_array()){
            $total += $row['working_hours'];
        }
        // sum of total working hours
        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'total'=>$total,
                'date'=>'Today',
                'id'=>$pumper_id,
                'remark'=>1,
                'error'=>'',
            ];
            return $data;
        }
        else{
            $data=[
               
                'remark'=>2,
                'date'=>'Today',
                'id'=>$pumper_id,
                'error'=>'No Records',
            ];
            return $data;
        }

    }
    public function previous1($data){
        $result = $this->connection();

        $pumper_id = $_SESSION['id'];

        date_default_timezone_set('Asia/Kolkata');
        $from = $data['from'];
        $to = $data['to'];
        // concatination two strings
        $date = $from.'  : '.$to;
        // get data from database to related to the given date range
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND (Date>='".$from."' AND Date<='".$to."')";
        $query = $result->query($sql);
        $sql="select *from $this->table where Pumper_id='".$pumper_id."' AND (Date>='".$from."' AND Date<='".$to."')";
        $query1 = $result->query($sql);
        $total=0;
        while($row = $query1->fetch_array()){
            $total += $row['working_hours'];
        }
    //sum of working hours

     

        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'total'=>$total,
                'date'=>$date,
                'id'=>$pumper_id,
                'error'=>'',
            ];
            return $data;
        }
        else{
            $data=[
                'result'=>$query,
                'total'=>$total,
                'date'=>$date,
                'id'=>$pumper_id,
                
                'error'=>'NO RECORDS',
            ];
            return $data;
        }

    }
}
