<?php


class M_User extends Model
{
    protected $table = 'ordert';
    protected $table1 = 'fuel_availability';
    protected $table2= 'expired_orders';
    
    public function load($data){
        $remark = $data['remark'];
        $result = $this->connection();
        $sql = "select *from $this->table1 where fuel_type='auto diesel'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $price_auto = $row['price'];
            $remain_auto = $row['eligible_amount'];
        }
        $sql = "select *from $this->table1 where fuel_type='octane 92'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $price_92 = $row['price'];
            $remain_92 = $row['eligible_amount'];
        }
        $sql = "select *from $this->table1 where fuel_type='octane 95'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $price_95 = $row['price'];
            $remain_95 = $row['eligible_amount'];
        }
        $sql = "select *from $this->table1 where fuel_type='super diesel'";
        $query = $result->query($sql);
        while($row = $query->fetch_array()){
            $price_super = $row['price'];
            $remain_super = $row['eligible_amount'];
        }

        if($remark == 1){
            $err = "";
        }
        if($remark == 0){
            $err = 'This order Id is expired!!!';
        }
        if($remark == -1){
            $err = "This order ID is Invalid!!";
        }





        $data = [
            'price_auto' => $price_auto,
            'remain_92' => $remain_92,
            'remain_auto' => $remain_auto,
            'price_92' => $price_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'remain_super' => $remain_super,
            'err'=>$err

        ];
      
        return $data;

    }
    public function order_verify($data){
        $order_id='';
        $check_id = $data['order_no'];
        $date = date('Y-m-d');
        $result=$this->connection();

        $sql="INSERT INTO $this->table2(order_id,Fuel_Type,amount)SELECT Oid,ftype,amount FROM $this->table WHERE ndate<CURRENT_DATE()";
        $query=$result->query($sql);

        $sql="DELETE FROM $this->table where ndate<CURRENT_DATE()";
        $query=$result->query($sql);
        
        
       

        $sql="select SUM(amount) AS count from $this->table2 where Fuel_Type = 'octane 92' AND remark=0";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count=$row['count'];
            }
            $sql="select *from $this->table1 where fuel_type='octane 92'";
            $query=$result->query($sql);
            while($row=$query->fetch_array()){
                $octane_92=$row['eligible_amount'];
            }
            $total=$octane_92+$count;
            $sql="UPDATE $this->table1 set eligible_amount=$total where fuel_type = 'octane 92'";
            $query=$result->query($sql);
            $sql="UPDATE $this->table2 set remark=1 where Fuel_Type = 'octane 92'";
            $query=$result->query($sql);


        }
        $sql="select SUM(amount) AS count from $this->table2 where Fuel_Type = 'octane 95' AND remark=0";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count=$row['count'];
            }
            $sql="select *from $this->table1 where fuel_type='octane 95'";
            $query=$result->query($sql);
            while($row=$query->fetch_array()){
                $octane_92=$row['eligible_amount'];
            }
            $total=$octane_92+$count;
            $sql="UPDATE $this->table1 set eligible_amount=$total where fuel_type = 'octane 95'";
            $query=$result->query($sql);
            $sql="UPDATE $this->table2 set remark=1 where Fuel_Type = 'octane 95'";
            $query=$result->query($sql);


        }

        $sql="select SUM(amount) AS count from $this->table2 where Fuel_Type = 'auto diesel' AND remark=0";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count=$row['count'];
            }
            $sql="select *from $this->table1 where fuel_type='auto diesel'";
            $query=$result->query($sql);
            while($row=$query->fetch_array()){
                $octane_92=$row['eligible_amount'];
            }
            $total=$octane_92+$count;
            $sql="UPDATE $this->table1 set eligible_amount=$total where fuel_type = 'auto diesel'";
            $query=$result->query($sql);
            $sql="UPDATE $this->table2 set remark=1 where Fuel_Type = 'auto diesel'";
            $query=$result->query($sql);


        }

        $sql="select SUM(amount) AS count from $this->table2 where Fuel_Type = 'super diesel' AND remark=0";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $count=$row['count'];
            }
            $sql="select *from $this->table1 where fuel_type='super diesel'";
            $query=$result->query($sql);
            while($row=$query->fetch_array()){
                $octane_92=$row['eligible_amount'];
            }
            $total=$octane_92+$count;
            $sql="UPDATE $this->table1 set eligible_amount=$total where fuel_type = 'super diesel'";
            $query=$result->query($sql);
            $sql="UPDATE $this->table2 set remark=1 where Fuel_Type = 'super diesel'";
            $query=$result->query($sql);


        }
        $sql="select * from $this->table where Oid = '".$check_id."'";
        $check= $result->query($sql);

        if($check->num_rows>0){
            while($row = $check->fetch_assoc()){
            $order_id = $row['Oid'];
          
            }
            $_SESSION['order_id']=$order_id;
            return 3;
            
           

        }

        else{
            $sql="select * from $this->table2 where order_id = '".$check_id."'";
            $check= $result->query($sql);
            if($check->num_rows>0){
                return 1;
            }
            else{
                return 2;
            }

            
        }
        

    }
}