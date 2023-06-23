<?php
class M_Overall extends Model{
    protected $table ='daily_fuel_record';

    protected $table1='complete_order';
    public function load(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $result=$this->connection();
       
        $sql = "select *from $this->table where machine='A' AND date =CURRENT_DATE()";
        $query = $result->query($sql);
        $total_A=0;
        while($row = $query->fetch_array()){
            $total_A+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='B' AND date =CURRENT_DATE()";
        $query = $result->query($sql);
        $total_B=0;
        while($row = $query->fetch_array()){
            $total_B+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='C' AND date =CURRENT_DATE()";
        $query = $result->query($sql);
        $total_C=0;
        while($row = $query->fetch_array()){
            $total_C+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='D' AND date =CURRENT_DATE()";
        $query = $result->query($sql);
        $total_D=0;
        while($row = $query->fetch_array()){
            $total_D+=$row['amount'];
        }

        $sql="select *from $this->table1 where Fuel_Type='octane 92' AND DATE(time)= CURRENT_DATE()";
        $query=$result->query($sql);
        $count_92=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_92+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='octane 95' AND DATE(time) = CURRENT_DATE()";
        $query=$result->query($sql);
        $count_95=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_95+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='auto diesel' AND DATE(time) = CURRENT_DATE()";
        $query=$result->query($sql);
        $count_auto=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_auto+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='super diesel' AND DATE(time) = CURRENT_DATE()";
        $query=$result->query($sql);
        $count_super=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_super+=$row['pumped_liters'];
            }
        }

        $data = [
            'total_A'=>$total_A,
            'total_B'=>$total_B,
            'total_C'=>$total_C,
            'total_D'=>$total_D,
            '92'=>$count_92,
            '95'=>$count_95,
            'auto'=>$count_auto,
            'super'=>$count_super,
            'date'=>$date,

        ];
       
        return $data;

    }
    public function previous($data){
        $to=$data['to'];
        $from=$data['from'];
        $result=$this->connection();
       
        $sql = "select *from $this->table where machine='A' AND (date>='".$from."' AND date<='".$to."')";
        $query = $result->query($sql);
        $total_A=0;
        while($row = $query->fetch_array()){
            $total_A+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='B' AND (date>='".$from."' AND date<='".$to."')";
        $query = $result->query($sql);
        $total_B=0;
        while($row = $query->fetch_array()){
            $total_B+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='C' AND (date>='".$from."' AND date<='".$to."')";
        $query = $result->query($sql);
        $total_C=0;
        while($row = $query->fetch_array()){
            $total_C+=$row['amount'];
        }
        $sql = "select *from $this->table where machine='D' AND (date>='".$from."' AND date<='".$to."')";
        $query = $result->query($sql);
        $total_D=0;
        while($row = $query->fetch_array()){
            $total_D+=$row['amount'];
        }

        $sql="select *from $this->table1 where Fuel_Type='octane 92' AND (DATE(time)>='".$from."' AND DATE(time)<='".$to."')";
        $query=$result->query($sql);
        $count_92=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_92+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='octane 95' AND (DATE(time)>='".$from."' AND DATE(time)<='".$to."')";
        $query=$result->query($sql);
        $count_95=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_95+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='auto diesel' AND (DATE(time)>='".$from."' AND DATE(time)<='".$to."')";
        $query=$result->query($sql);
        $count_auto=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_auto+=$row['pumped_liters'];
            }
        }
        $sql="select *from $this->table1 where Fuel_Type='super diesel' AND (DATE(time)>='".$from."' AND DATE(time)<='".$to."')";
        $query=$result->query($sql);
        $count_super=0;
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count_super+=$row['pumped_liters'];
            }
        }

        $data = [
            'total_A'=>$total_A,
            'total_B'=>$total_B,
            'total_C'=>$total_C,
            'total_D'=>$total_D,
            '92'=>$count_92,
            '95'=>$count_95,
            'auto'=>$count_auto,
            'super'=>$count_super,
            'date'=>'',

        ];
       
        return $data;


    }
}