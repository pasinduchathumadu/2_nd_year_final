<?php

class M_Analysis extends Model{
    protected $table = "daily_fuel_record";

    public function loading($data){
        $date=$data['date'];
        $pumper_id=$_SESSION['id'];
        $result = $this->connection();
      
        $sql="select *from $this->table where( (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (fuel_type='octane 92'))";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_92=0;
            while($row=$query->fetch_array()){
                $total_92+=$row['amount'];
            }

        }
        else{
            $total_92=0;

        }
        $sql="select *from $this->table where (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (fuel_type='octane 95')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_95=0;
            while($row=$query->fetch_array()){
                $total_95+=$row['amount'];
            }

        }
        else{
            $total_95=0;

        }
        $sql="select *from $this->table where (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (fuel_type='super diesel')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_super=0;
            while($row=$query->fetch_array()){
                $total_super+=$row['amount'];
            }

        }
        else{
            $total_super=0;

        }
        $sql="select *from $this->table where (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (fuel_type='auto diesel')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_auto=0;
            while($row=$query->fetch_array()){
                $total_auto+=$row['amount'];
            }

        }
        else{
            $total_auto=0;

        }

        $sql="select *from $this->table where (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (machine='A')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_A=0;
            while($row=$query->fetch_array()){
                $total_A+=$row['amount'];
            }

        }
        else{
            $total_A=0;

        }

        $sql="select *from $this->table where (Pumper_id='".$pumper_id."' AND date = '".$date."') AND (machine='B')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_B=0;
            while($row=$query->fetch_array()){
                $total_B+=$row['amount'];
            }

        }
        else{
            $total_B=0;

        }

        $data=[
            '92'=>$total_92,
            '95'=>$total_95,
            'super'=>$total_super,
            'auto'=>$total_auto,
            'date'=>$date,
            'total_A'=>$total_A,
            'total_B'=>$total_B,

        ];
        return $data;

    }

}