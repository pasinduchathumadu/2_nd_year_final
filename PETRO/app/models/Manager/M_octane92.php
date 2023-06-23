<?php

class M_octane92 extends Model{
    protected $table1 = "fuel_availability";
    protected $table2 = "fuel_stock";

    public function add92($data){
        $result=$this->connection();
        $fuel_id = "O92";
        $fuel_type = "octane 92";
        $arrive_amount = $data['arrive_amount'];
        $eligible_amount = $data['eligible_amount'];
        $remain_amount = $arrive_amount-$eligible_amount;

        $sql1= "insert into $this->table2 (fuel_type,arrive_amount) values ('$fuel_type','$arrive_amount') ";
        $query1 = $result->query($sql1);
        $sql2 = "insert into  $this->table1 (fuel_id,fuel_type) values ('$fuel_id','$fuel_type')";
        $query2 = $result->query($sql2);
        $sql3 = "update  $this->table1 SET eligible_amount = eligible_amount + $eligible_amount WHERE fuel_id = 'O92' AND fuel_type = 'octane 92'" ;
        $query3 = $result->query($sql3);
        $sql4 = "update  $this->table1 SET eligible_amount= 0 where eligible_amount IS NULL ";
        $query4 = $result->query($sql4);
        $sql5 = "update  $this->table1 SET remain_amount = remain_amount + $remain_amount WHERE fuel_id = 'O92' AND fuel_type = 'octane 92'";
        $query5 = $result->query($sql5);

        if($sql1&&$sql2&&$sql3&&$sql4&&$sql5){
            return true;
        }
        else{
            echo "vvvvvvvvv";
        }
    }
}