<?php

class M_Home extends Model{
    protected $table = 'fuel_availability';

    protected $table1='user_form';
    protected $table2 = 'fuel_stock';

    protected $table3 = 'pumper';

    protected $table4 = 'customer_manager';

    protected $table5 = 'distribution_manager';

    
    public function update_fuel(){
        $result = $this->connection();

        $sql1 = "select * from $this->table where fuel_id= 'O92'";
        $query1 = $result->query($sql1);
        $sql2 = "select * from $this->table where fuel_id= 'O95'";
        $query2 = $result->query($sql2);
        $sql3 = "select * from $this->table where fuel_id= 'SDL'";
        $query3 = $result->query($sql3);
        $sql4 = "select * from $this->table where fuel_id= 'ADL'";
        $query4 = $result->query($sql4);

        if($query1->num_rows>0){
            while($row = $query1->fetch_array()){
                $fuel_id = $row['fuel_id'];
                $fuel_type = $row['fuel_type'];
                $eligible_amount = $row['eligible_amount'];
                $remain_amount = $row['remain_amount'];
                $price = $row['price'];
            }
        }
        if($query2->num_rows>0){
            while($row = $query2->fetch_array()){
                $fuel_id2 = $row['fuel_id'];
                $fuel_type2 = $row['fuel_type'];
                $eligible_amount2 = $row['eligible_amount'];
                $remain_amount2 = $row['remain_amount'];
                $price2 = $row['price'];
            }
        }

        if($query3->num_rows>0){
            while($row = $query3->fetch_array()){
                $fuel_id3 = $row['fuel_id'];
                $fuel_type3 = $row['fuel_type'];
                $eligible_amount3 = $row['eligible_amount'];
                $remain_amount3 = $row['remain_amount'];
                $price3 = $row['price'];
            }
        }
        if($query4->num_rows>0){
            while($row = $query4->fetch_array()){
                $fuel_id4 = $row['fuel_id'];
                $fuel_type4 = $row['fuel_type'];
                $eligible_amount4 = $row['eligible_amount'];
                $remain_amount4 = $row['remain_amount'];
                $price4 = $row['price'];
            }
        }
        $sql="select COUNT(id) AS COUNT1 FROM $this->table1";
        $query=$result->query($sql);
        while($row=$query->fetch_array()){
            $count1=$row['COUNT1'];
        }
        $sql="select COUNT(id) AS COUNT2 FROM $this->table3";
        $query=$result->query($sql);
        while($row=$query->fetch_array()){
            $count2=$row['COUNT2'];
        }
        $sql="select COUNT(customer_manager_id) AS COUNT3 FROM $this->table4";
        $query=$result->query($sql);
        while($row=$query->fetch_array()){
            $count3=$row['COUNT3'];
        }
        $sql="select COUNT(distribution_manager_id) AS COUNT4 FROM $this->table5";
        $query=$result->query($sql);
        while($row=$query->fetch_array()){
            $count4=$row['COUNT4'];
        }
            $data =[
                'fuel_id'=> $fuel_id,
                'fuel_type' => $fuel_type,
                'eligible_amount' => $eligible_amount,
                'remain_amount' => $remain_amount,
                'price' =>$price,
                'fuel_id2'=> $fuel_id2,
                'fuel_type2' => $fuel_type2,
                'eligible_amount2' => $eligible_amount2,
                'remain_amount2' => $remain_amount2,
                'price2' =>$price2,
                'fuel_id3'=> $fuel_id3,
                'fuel_type3' => $fuel_type3,
                'eligible_amount3' => $eligible_amount3,
                'remain_amount3' => $remain_amount3,
                'price3' =>$price3,
                'fuel_id4'=> $fuel_id4,
                'fuel_type4' => $fuel_type4,
                'eligible_amount4' => $eligible_amount4,
                'remain_amount4' => $remain_amount4,
                'price4' =>$price4,
                'count1'=>$count1,
                'count2'=>$count2,
                'count3'=>$count3,
                'count4'=>$count4,
                'loading'=>'1',
                'err'=>'',
            ];
            return $data;

    }
}