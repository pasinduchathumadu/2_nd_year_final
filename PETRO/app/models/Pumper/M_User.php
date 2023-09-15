<?php


class M_User extends Model
{
    protected $table = 'ordert';
    protected $table1 = 'fuel_availability';
  
    protected $table6 = 'user_form';
    protected $table3 = 'registered_users';

    protected $table4 = 'pumper_mashine';

    protected $table5 = 'complete_order';

    
    
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
            $err = 'This order Id is Expired!!!';
        }
        if($remark == -1){
            $err = "This order ID is Invalid!!";
        }
        if($data['logout_error'] == 1){
            $logout_error = 'Your shift time is not over!!!';
        }
        if($data['logout_error'] == ""){
            $logout_error = '';
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
            'error'=>$err,
            'error_non'=>'',
            'logout_error'=>$logout_error,

        ];
      
        return $data;

    }

    public function non_order($data){
        $result=$this->connection();
        $no=$data['no'];
       
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

        $sql="select *from $this->table3 where (phone ='".$no."' AND role = 'customer')AND status=1";
        $query = $result->query($sql);

        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $email = $row['email'];
                $name = $row['fname'];
                $name1 = $row['lname'];
            }
            $sql="select *from $this->table6 where email ='".$email."'";
            $query = $result->query($sql);

            while($row = $query->fetch_array()){
                $v = $row['vno'];
                $v1 = $row['vno1'];
                $v2 = $row['vno2'];
            }

            $full = $name." ".$name1;
    
            $data = [
                'price_auto' => $price_auto,
                'remain_92' => $remain_92,
                'remain_auto' => $remain_auto,
                'price_92' => $price_92,
                'price_95' => $price_95,
                'remain_95' => $remain_95,
                'price_super' => $price_super,
                'remain_super' => $remain_super,
                'no'=>$no,
                'v'=>$v,
                'v1'=>$v1,
                'v2'=>$v2,
                'email'=>$email,
                'full'=>$full,
                'remark'=>0,
                'error_non'=>'',
                'logout_error'=>'',
                'error'=>'',
                
            ];
            return $data;

        }

       
          
        
        else{
          $data = [
            'price_auto' => $price_auto,
            'remain_92' => $remain_92,
            'remain_auto' => $remain_auto,
            'price_92' => $price_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'remain_super' => $remain_super,
            'error_non'=>'You are not in a System!!!',
            'error'=>'',
            'logout_error'=>'',
          ];
          return $data;
        }

    }

    public function Non_complete($data){
        $result=$this->connection();

        $pump_id=$_SESSION['id'];
        $Fuel_Type = $data['Fuel_Type'];
        $vehicle_no = $data['vehicle'];
        $sql="select *FROM $this->table3 where (phone ='".$data['no']."'AND role = 'customer')AND status = 1 ";
        $query  = $result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $email = $row['email'];
                $name = $row['fname'];
                $name1 = $row['lname'];
                $no = $row['phone'];
            }
            $sql="select *from $this->table6 where email ='".$email."'";
            $query = $result->query($sql);

            while($row = $query->fetch_array()){
                $v = $row['vno'];
                $v1 = $row['vno1'];
                $v2 = $row['vno2'];
                $id = $row['id'];
            }
 

        $sql = "select *from $this->table1 where fuel_type = '".$data['Fuel_Type']."'";
        $query = $result->query($sql);

        while($row = $query->fetch_array()){
            $price = $row['price'];
            $eligible = $row['eligible_amount'];
            $empty = $row['empty_space'];
        }
        $pump = $data['liters'];
        $total_price = $pump*$price;
        $full = $name." ".$name1;

        $sql="select *from $this->table4 where pumperID = '".$pump_id."' AND date =CURRENT_DATE()";
        $query=$result->query($sql);

        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $machine = $row['MachineID'];
            }
        }
      
        $sql="insert into $this->table5(order_id,user_id,pumper_id,Fuel_Type,vehicle_no,Remaining,pumped_liters,pay,MachineID)values('Non-OID','$id','$pump_id','$Fuel_Type','$vehicle_no',0,'$pump','$total_price','$machine')";
        $query=$result->query($sql);

        $total_eligible = $eligible-$pump;
        $sql="update $this->table1 set eligible_amount ='".$total_eligible."' where fuel_type = '".$Fuel_Type."'";
        $query=$result->query($sql);

        $total_empty = $pump+$empty;

        $sql="update $this->table1 set empty_space ='".$total_empty."' where fuel_type = '".$Fuel_Type."'";
        $query=$result->query($sql);

        $data = [ 
            'no'=>$no,
            'v'=>$v,
            'v1'=>$v1,
            'v2'=>$v2,
            'email'=>$email,
            'full'=>$full,
         
            'error'=>'',
            'price'=>$total_price,
            'remark'=>1,
        ];
        return $data;
        }

    }
    public function order_verify($data){
        $order_id='';
        $check_id = $data['order_no'];
        $date = date('Y-m-d');
        $result=$this->connection();

        $result->query("CALL update_expired_orders()");

        $sql="select SUM(amount) AS count from $this->table where (ftype = 'octane 92') AND ndate<CURRENT_DATE()";
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
            $sql="UPDATE $this->table set remark='expire', amount=0 where ftype = 'octane 92' AND ndate<CURRENT_DATE()";
            $query=$result->query($sql);
           
        }
        $sql="select SUM(amount) AS count from $this->table where ftype = 'octane 95' AND ndate<CURRENT_DATE()";
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
            $sql="UPDATE $this->table set remark= 'expire', amount=0 where ftype = 'octane 95' AND ndate<CURRENT_DATE()";
            $query=$result->query($sql);


        }

        $sql="select SUM(amount) AS count from $this->table where ftype = 'auto diesel' AND ndate<CURRENT_DATE() ";
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
            $sql="UPDATE $this->table set remark= 'expire',amount=0 where ftype = 'auto diesel' AND ndate<CURRENT_DATE()";
            $query=$result->query($sql);


        }

        $sql="select SUM(amount) AS count from $this->table where ftype = 'super diesel' AND ndate<CURRENT_DATE()";
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
            $sql="UPDATE $this->table set remark= 'expire', amount=0 where ftype = 'super diesel' AND ndate<CURRENT_DATE()";
            $query=$result->query($sql);


        }
    
        $sql="select * from $this->table where Oid = '".$check_id."' And remark ='pending'";
        $check= $result->query($sql);

        if($check->num_rows>0){
            while($row = $check->fetch_assoc()){
            $order_id = $row['Oid'];
          
            }
            $_SESSION['order_id']=$order_id;
            return 3;
            
           

        }

        else{
            $sql="select * from $this->table where Oid = '".$check_id."' AND remark = 'expire'";
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