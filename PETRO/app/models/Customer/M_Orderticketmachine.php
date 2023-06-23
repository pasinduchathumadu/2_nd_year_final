<?php

class M_Orderticketmachine extends Model
{
    protected $table = 'porder';
    protected $table1='ordert';
    protected $table2='user_form';
    protected $table3 = 'fuel_availability';


    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    public function orderticketmachine($data){
        $result=$this->connection();

        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
       
    

      
        $sql = "select * from $this->table  where id='".$id."' ORDER BY Oid DESC LIMIT 1";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $Oid= $row['Oid'];
            $id= $row['id'];
            $email= $row['email'];
            $VMno= $row['VMno'];
        
            $ftype = $row['ftype'];
            $amount= $row['amount'];
            $points= $row['points'];
            $petropoints= $row['petropoints'];
      
            
          
        }


        $sql1 = "select *from $this->table3 where fuel_type='auto diesel'";
        $query1 = $result->query($sql1);
        while($row = $query1->fetch_array()){
            $price_auto = $row['price'];
            $remain_auto = $row['eligible_amount'];
        }

        $sql2 = "select *from $this->table3 where fuel_type='octane 92'";
        $query2 = $result->query($sql2);
        while($row = $query2->fetch_array()){
            $price_92 = $row['price'];
            $remain_92 = $row['eligible_amount'];
        }

        $sql3 = "select *from $this->table3 where fuel_type='octane 95'";
        $query3 = $result->query($sql3);
        while($row = $query3->fetch_array()){
            $price_95 = $row['price'];
            $remain_95 = $row['eligible_amount'];
        }
        $sql4 = "select *from $this->table3 where fuel_type='super diesel'";
        $query4 = $result->query($sql4);
        while($row = $query4->fetch_array()){
            $price_super = $row['price'];
            $remain_super = $row['eligible_amount'];
        }



        $arr=array(
            'email' => $email,
            'VMno' => $VMno,
            'fname' => $fname,
            
            'ftype'=>$ftype,
            'amount'=>$amount,
            'points'=>$points,
            'petropoints'=>$petropoints,
            'Oid' => $Oid,
           
            
            'id'=>$id,

            'remain_auto'=> $remain_auto,
            'price_92' => $price_92,
            'remain_92' => $remain_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'price_auto' => $price_auto,
            'remain_super' => $remain_super,
          
          
        );
        return $arr;
    }


    public function add($data){
        $result1=$this->connection();
        $id =$_SESSION ['CUS_id'];
        echo $id;
        $Oid =$data ['Oid'];
        $email =$data ['email'];
        $vno =$data ['vno'];
        $vtype =$data ['vtype'];
        $ftype =$data ['ftype'];
        $amount =$data ['amount'];
        $price =$data ['price'];
        $petropoints =$data ['petropoints'];
        $usedpoints =$data ['usedpoints'];
       
        
        $ndate =$data ['ndate'];
        $status =$data ['status'];

         $sql = "INSERT INTO $this->table1 (Oid,id,email,VMno,vtype,ftype,amount,price,points,ndate) VALUES('$Oid','$id','$email','$vno','$vtype','$ftype','$amount','$price','$usedpoints','$ndate')";
         $query3 = $result1->query($sql); 
         $sql1=  "UPDATE $this->table3 SET eligible_amount = eligible_amount - $amount WHERE fuel_type = '$ftype'";
         $query4 = $result1->query($sql1); 

         $sql10=  "UPDATE $this->table3 SET empty_space = empty_space + $amount WHERE fuel_type = '$ftype'";
         $query10 = $result1->query($sql10); 

         $sql2= " UPDATE $this->table2 SET points = '$petropoints' WHERE id = '$id'";
         $query5 = $result1->query($sql2); 
       

         if(($query3 && $query4) && ($query5 && $query10) ){
        
                return 1;
         }
          
            
         else{
            return 5;
         }
      } 
            











      public function records($data){
        $result1=$this->connection();
        $id = $_SESSION['CUS_id'];

    
        $Oid =$data ['Oid'];
        $email =$data ['email'];
        $vno =$data ['vno'];
        $vtype =$data ['vtype'];
        $ftype =$data ['ftype'];
        $amount =$data ['amount'];
        $price =$data ['price'];
        $ndate =$data ['ndate'];
        $usedpoints =$data ['usedpoints'];

        



        $recipient = $email;
        $subject = "ORDER TICKET";
        

        $message = "
        Your Order ID:&nbsp;&nbsp; $oid<br>
        Machine no:&nbsp;&nbsp;$vno<br>
        Machine type:&nbsp;&nbsp;$vtype<br>
        Fuel Type:&nbsp;&nbsp;$ftype<br>
        Fuel Amount:&nbsp;&nbsp;$amount<br>
        Price:&nbsp;&nbsp;$price<br>
        Order Expire date:&nbsp;&nbsp;$ndate<br>
        ";


        $data=[
            'recipient'=>$recipient,
            'subject'=>$subject,
            'message'=>$message,
        ];
        

       
       

        $check=$this->send_mail->send_Mail($data);
        return $data;


           }
        }
          
          
    






