<?php
    class M_Income extends Model{
        protected $table='complete_order';

        public function income(){
            date_default_timezone_set('Asia/Kolkata');
            $date = date('Y-m-d');
            $result=$this->connection();
            $sql="select *from $this->table where Fuel_Type='octane 92' AND Date(time)=CURRENT_DATE()";
            $query=$result->query($sql);
            $p_92=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_92+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='octane 95' AND Date(time)=CURRENT_DATE()";
            $query=$result->query($sql);
            $p_95=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_95+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='auto diesel' AND Date(time)=CURRENT_DATE()";
            $query=$result->query($sql);
            $p_auto=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_auto+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='super diesel' AND Date(time)=CURRENT_DATE()";
            $query=$result->query($sql);
            $p_super=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_super+=$row['pay'];
                }
            }

            $total=$p_92+$p_95+$p_auto+$p_super;
            
            $data=[
                '92'=>$p_92,
                '95'=>$p_95,
                'auto'=>$p_auto,
                'super'=>$p_super,
                'date'=>$date,
                'total'=>$total,
            ];

            return $data;
        }
        public function previous($data){
            date_default_timezone_set('Asia/Kolkata');
            $date=$data['month'];
            $year = date('Y', strtotime($date));
            $month = date('m',strtotime($date));
            echo $month;
            $result=$this->connection();
            $sql="select *from $this->table where Fuel_Type='octane 92' AND (MONTH(time)='".$month."'AND YEAR(time)='".$year."')";
            $query=$result->query($sql);
            $p_92=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_92+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='octane 95' AND (MONTH(time)='".$month."'AND YEAR(time)='".$year."')";
            $query=$result->query($sql);
            $p_95=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_95+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='auto diesel' AND (MONTH(time)='".$month."' AND YEAR(time)='".$year."')";
            $query=$result->query($sql);
            $p_auto=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_auto+=$row['pay'];
                }
            }
            $sql="select *from $this->table where Fuel_Type='super diesel' AND (MONTH(time)='".$month."' AND YEAR(time)='".$year."')";
            $query=$result->query($sql);
            $p_super=0;
            if($query->num_rows>0){
                while($row=$query->fetch_array()){
                    $p_super+=$row['pay'];
                }
            }

            $total=$p_92+$p_95+$p_auto+$p_super;
            
            $data=[
                '92'=>$p_92,
                '95'=>$p_95,
                'auto'=>$p_auto,
                'super'=>$p_super,
                'date'=>$date,
                'total'=>$total,
               
            ];

            return $data;
        }

        
}
?>