<?php

class M_Analysis extends Model{
    protected $table = "complete_order";

    protected $table1 = "pumper_mashine";

    public function loading($data){
        $date=$data['date'];
        $pumper_id=$_SESSION['id'];
        $result = $this->connection();

    //obtain the overall distribution for particular day

    // get the details according to the fuel type
      
        $sql="select *from $this->table where( (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (Fuel_type='octane 92'))";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_92=0;
            while($row=$query->fetch_array()){
                $total_92+=$row['pumped_liters'];
            }

        }
        else{
            $total_92=0;

        }
        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (Fuel_type='octane 95')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_95=0;
            while($row=$query->fetch_array()){
                $total_95+=$row['pumped_liters'];
            }

        }
        else{
            $total_95=0;

        }
        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (Fuel_type='super diesel')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_super=0;
            while($row=$query->fetch_array()){
                $total_super+=$row['pumped_liters'];
            }

        }
        else{
            $total_super=0;

        }
        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (Fuel_type='auto diesel')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_auto=0;
            while($row=$query->fetch_array()){
                $total_auto+=$row['pumped_liters'];
            }

        }
        else{
            $total_auto=0;

        }

        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (MachineID=1)";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_A=0;
            while($row=$query->fetch_array()){
                $total_A+=$row['pumped_liters'];
            }

        }
        else{
            $total_A=0;

        }

        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (MachineID=2)";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_B=0;
            while($row=$query->fetch_array()){
                $total_B+=$row['pumped_liters'];
            }

        }
        else{
            $total_B=0;

        }
        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (MachineID=3)";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_c=0;
            while($row=$query->fetch_array()){
                $total_c+=$row['pumped_liters'];
            }

        }
        else{
            $total_c=0;

        }
        $sql="select *from $this->table where (pumper_id='".$pumper_id."' AND DATE(time) = '".$date."') AND (MachineID=4)";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $total_d=0;
            while($row=$query->fetch_array()){
                $total_d+=$row['pumped_liters'];
            }

        }
        else{
            $total_d=0;

        }



        $data=[
            '92'=>$total_92,
            '95'=>$total_95,
            'super'=>$total_super,
            'auto'=>$total_auto,
            'date'=>$date,
            'total_A'=>$total_A,
            'total_B'=>$total_B,
            'total_c'=>$total_c,
            'total_d'=>$total_d,


        ];
        return $data;

    }

}