<?php

class M_Order extends Model{

    protected $table = 'ordert';

    protected $table1 = 'fuel_availability';

    protected $table2 = "complete_order";

    protected $table3 = "daily_fuel_pumper";

    protected $table4 = "daily_fuel_record";

   
    public $send_mail;
    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    
      
    public function order_validation($data){
        $result = $this->connection();
        $order_id=$_SESSION['order_id'];
        $sql="select *from $this->table where Oid='".$order_id."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $vehicle_no = $row['VMno'];
                $Fuel_Type = $row['ftype'];
                $class = $row['vtype'];
                $Amount = $row['amount'];
                $payment = $row['price'];
                $method = $row['pmethod'];
                $points = $row['points'];
            }
            $arr =array(
                'vehicle_no'=> $vehicle_no,
                'Fuel_Type' => $Fuel_Type,
                'class' => $class,
                'Amount' => $Amount,
                'payment' =>$payment,
                'method'=> $method,
                'points'=>$points,
                'loading'=>'1',
                'err'=>'',
            );
            return $arr;

        }
        else{
            return false;
        }
    }
    public function order_complete($data){
        $pumped_liters=$data['pumped'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $result = $this->connection();
        $order_id=$_SESSION['order_id'];
        $pump_id=$_SESSION['id'];
        $sql="select *from $this->table where Oid='".$order_id."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $vehicle_no = $row['VMno'];
                $Fuel_Type = $row['ftype'];
                $class = $row['vtype'];
                $Amount = $row['amount'];
                $payment = $row['price'];
                $points=$row['points'];
            }
            $remaining_liters=$Amount-$pumped_liters;
            $price_petro=0;
            if($remaining_liters>=0 && ($pumped_liters<=$Amount && $pumped_liters>0)){
                $sql="update $this->table set amount ='".$remaining_liters."' where Oid = '".$order_id."'";
                $query=$result->query($sql);
                $sql="select *from $this->table where Oid='".$order_id."'";
                $query=$result->query($sql);
                while($row =$query->fetch_array()){
                    $category=$row['ftype'];
                    $payment=$row['price'];
                }
                $sql="select *from $this->table1 where fuel_type='".$category."'";
                $query=$result->query($sql);
                while($row =$query->fetch_array()){
                    $price_petro=$row['price'];
                    $eligible = $row['eligible_amount'];
                }
                if($category=="octane 92"){
                    $price=$price_petro*$pumped_liters;
                }
                elseif($category=="octane 95"){
                    $price=$price_petro*$pumped_liters;
                }
                elseif($category=="super diesel"){
                    $price = $price_petro * $pumped_liters;

                }
                elseif($category=="auto diesel"){
                    $price = $price_petro * $pumped_liters;
                }
                $points=$points+$pumped_liters*5;
                $sql="update $this->table set points ='".$points."' where Oid = '".$order_id."'";
                $query=$result->query($sql);
                $arr =array(
                    'vehicle_no'=> $vehicle_no,
                    'Fuel_Type' => $Fuel_Type,
                    'class' => $class,
                    'Amount' => $Amount,
                    'payment' =>$payment,
                    'per_liter'=>$price_petro,
                    'pumped_liters'=>$pumped_liters,
                    'price'=>$price,
                    'remaining_liters'=>$remaining_liters,
                    'loading'=>'0',
                    'points'=>$points,
                    'err'=>'YOU ORDER HAS BEEN SUCCESSFULLY COMPLETED!'
                );
                $sql = "update $this->table set price = $payment-$price where Oid='".$order_id."'";
                $query = $result->query($sql);
                $sql="insert into $this->table2(order_id,pumper_id,Fuel_Type,vehicle_no,Remaining,pumped_liters,pay)values('$order_id','$pump_id','$Fuel_Type','$vehicle_no','$remaining_liters','$pumped_liters','$price')";
                $query=$result->query($sql);

                

                $total_eligible = $remaining_liters + $eligible;
                $sql="update $this->table1 set eligible_amount ='".$total_eligible."' where fuel_type = '".$category."'";
                $query=$result->query($sql);


                $sql="select *from $this->table3 where (Pumper_id = '".$pump_id."' AND date = '".$date."')";
                $query=$result->query($sql);
                if($query->num_rows>0){
                    $sql="select *from $this->table4 where ((Pumper_id = '".$pump_id."' AND date = '".$date."')AND(fuel_type='".$Fuel_Type."' AND
                    machine='B'))";
                    $query = $result->query($sql);
                    if($query->num_rows>0){
                        while($row = $query->fetch_array()){
                            $total_old=$row['amount'];
                        }
                        $total_new = $total_old+$pumped_liters;


                        $sql="update $this->table4 set amount='".$total_new."' where ((Pumper_id = '".$pump_id."' AND date = '".$date."')AND(fuel_type='".$Fuel_Type."' AND
                        machine='A'))";
                        $query = $result->query($sql);

                    }
                    else{

                        $sql="insert into $this->table4 values('$pump_id','$date','B','$Fuel_Type','$pumped_liters')";
                        $query=$result->query($sql);
                    }


                }
                else{
                    $sql="insert into $this->table3 (Pumper_id,date)values('$pump_id','$date')";
                    $query=$result->query($sql);
                    $sql="insert into $this->table4 values('$pump_id','$date','A','$Fuel_Type','$pumped_liters')";
                    $query=$result->query($sql);
                }



                // this part is related to the email message sender to the customer 

                $sql1="select *from $this->table where Oid = '".$order_id."'";
                $query1 = $result->query($sql1);

                if($query1 -> num_rows>0){
                    while($row = $query1->fetch_array()){
                        $email = $row['Email'];
                    }
                }
                $recipient = $email;
                $subject ="COMPELTE ORDERS";
                $message = "Dear Valid Customer <br> YOUR Vehicle No:$vehicle_no <br>
                FUEL : $Fuel_Type
                <br>Vehicle Type:$class <br> Remaining Liters:$remaining_liters<br>
                payment:$price<br>
                PETRO Points: $points<br>
                BEST REGARDS COME AGAIN!!!!!!";

                $data = [
                    'recipient' => $recipient,
                    'subject' => $subject,
                    'message' => $message,
                ];
                $check=$this->send_mail->send_Mail($data);
                if ($check) {
                    return $arr;

                }
            }
            else{
                $arr=array(
                    'vehicle_no'=> $vehicle_no,
                    'Fuel_Type' => $Fuel_Type,
                    'class' => $class,
                    'Amount' => '0',
                    'payment' =>$payment,
                    'points'=>$points,
                    'per_liter'=>$price_petro,
                    'loading'=>'1',
                    'err'=>'This Process can not be done!',
                );
                return $arr;

            }

        }

    }
}