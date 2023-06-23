<?php

class M_Sdiesel extends Model{
    protected $table1 = "fuel_availability";
    protected $table2 = "fuel_stock";

    public function addsdl($data){
        $result=$this->connection();
        $fuel_id = "SDL";
        $fuel_type = "super diesel";
        $arrive_amount = $data['arrive_amount'];
        $eligible_amount = $data['eligible_amount'];
        $remain_amount = $arrive_amount-$eligible_amount;

        $sql1= "insert into $this->table2 (fuel_type,arrive_amount) values ('$fuel_type','$arrive_amount') ";
        $query1 = $result->query($sql1);
        $sql2 = "insert into  $this->table1 (fuel_id,fuel_type) values ('$fuel_id','$fuel_type')";
        $query2 = $result->query($sql2);
        $sql3 = "update  $this->table1 SET eligible_amount = eligible_amount + $eligible_amount WHERE fuel_id = 'SDL' AND fuel_type = 'super diesel'" ;
        $query3 = $result->query($sql3);
        $sql4 = "update  $this->table1 SET eligible_amount= 0 where eligible_amount IS NULL ";
        $query4 = $result->query($sql4);
        $sql5 = "update  $this->table1 SET remain_amount = remain_amount + $remain_amount WHERE fuel_id = 'SDL' AND fuel_type = 'super diesel'";
        $query5 = $result->query($sql5);

        if($sql1&&$sql2&&$sql3&&$sql4&&$sql5){
            return true;
        }
        else{
            return false;
        }
    }
}