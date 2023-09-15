<?php

class M_Order extends Model{

    protected $table = 'ordert';

    protected $table6 = 'user_form';

    protected $table1 = 'fuel_availability';

    protected $table2 = "complete_order";

    protected $table3 = "daily_fuel_pumper";

    protected $table4 = "daily_fuel_record";

    protected $table5 = "pumper_mashine";

   
    public $send_mail;
    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    
      
    public function order_validation($data){
        $result = $this->connection();
        $order_id=$_SESSION['order_id'];
        $sql="select *from $this->table where Oid='".$order_id."'";
        $query = $result->query($sql);
        // get the order details 
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $vehicle_no = $row['VMno'];
                $Fuel_Type = $row['ftype'];
                $class = $row['vtype'];
                $Amount = $row['amount'];
                $payment = $row['price'];
                
                $points = $row['points'];
            }
            $arr =array(
                'vehicle_no'=> $vehicle_no,
                'Fuel_Type' => $Fuel_Type,
                'class' => $class,
                'Amount' => $Amount,
                'payment' =>$payment,
                'remark'=>0,
                'points'=>$points,
                'loading'=>'1',
                'error'=>'',
                'success'=>'',
                
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

        
        $sql="select *from $this->table5 where pumperID = '".$pump_id."' AND date = '".$date."'";
        $query=$result->query($sql);

        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $machine = $row['MachineID'];
            }
        }
        // get the previous table
        $sql="select *from $this->table where Oid='".$order_id."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $vehicle_no = $row['VMno'];
                $id = $row['id'];
                $Fuel_Type = $row['ftype'];
                $class = $row['vtype'];
                $Amount = $row['amount'];
                $payment = $row['price'];
                $points = $row['points'];
               
            }
     
            $remaining_liters=$Amount-$pumped_liters;
            $price_petro=0;
            // solving errors
            if($remaining_liters>=0 && ($pumped_liters<=$Amount && $pumped_liters>0)){
                $sql="update $this->table set amount ='".$remaining_liters."' where Oid = '".$order_id."'";
                $query=$result->query($sql);
                if($remaining_liters==0){
                    $sql="UPDATE $this->table SET remark = 'completed' where Oid = '".$order_id."'";
                    $query=$result->query($sql);
                }
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
                    $empty = $row['empty_space'];
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
                //update the points
                //get the user_form points

                $sql = "select *from $this->table6 where id = '".$id."'";
                $query = $result->query($sql);
                while($row=$query->fetch_array()){
                    $original_points = $row['points'];
                }
                $original_points=$original_points+$pumped_liters;
                $sql="update $this->table6 set points ='".$original_points."' where id = '".$id."'";
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
                    'remark'=>1,
                    'loading'=>'0',
                    'points'=>$points,
                    'error'=>'',
                    'success'=>'YOU ORDER HAS BEEN SUCCESSFULLY COMPLETED!'
                );
            //pass record to complete order table
                $sql="insert into $this->table2(order_id,user_id,pumper_id,Fuel_Type,vehicle_no,Remaining,pumped_liters,pay,MachineID)values('$order_id','$id','$pump_id','$Fuel_Type','$vehicle_no','$remaining_liters','$pumped_liters','$price','$machine')";
                $query=$result->query($sql);

                
                // update the fuel avalibility
                $total_eligible = $remaining_liters + $eligible;
                $sql="update $this->table1 set eligible_amount ='".$total_eligible."' where fuel_type = '".$category."'";
                $query=$result->query($sql);
                $total_empty = $empty-$remaining_liters;
                $sql="update $this->table1 set empty_space ='".$total_empty."' where fuel_type = '".$category."'";
                $query=$result->query($sql);


               

               


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
                Vehicle Type:$class <br>
                FUEL : $Fuel_Type <br>
                Pumped Liters : $pumped_liters <br>
                Remaining Liters:$remaining_liters<br>
                payment:$price<br>
                PETRO Points: $pumped_liters<br>
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
                    'Amount' => $Amount,
                    'payment' =>$payment,
                    'points'=>$points,
                    'per_liter'=>$price_petro,
                    'loading'=>'1',
                    'remark'=>1,
                    'error'=>'This Process can not be done!',
                    'success'=>'',
                );
                return $arr;

            }

        }

    }
}