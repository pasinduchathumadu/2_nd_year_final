<?php
    

class M_Home extends Model
{
    protected $table = 'products';
    protected $table1='fuel_availability';
    protected $table2='ordert';
    protected $table3='user_form';
    protected $table4='product_order';
    protected $table5='registered_users';

    public function mv($data){
    

        $id = $data['id'];
    
        $result=$this->connection();
        $sql = "select * from $this->table3 where id='".$id."'";
        $query=$result->query($sql);

        
        while($row = $query->fetch_array()){
           
            $email = $row['email'];
            $vno = $row['vno'];
            $vno1 = $row['vno1'];
            $vno2 = $row['vno2'];
            $sNo = $row['sNo'];
           
            $points=$row['points'];

       
        }

        $sql0 = "select * from $this->table5 where email='".$email."'";
        $query0=$result->query($sql0);

        
        while($row = $query0->fetch_array()){
           
            $fname = $row['fname'];
          

       
        }


        $sql1 = "select *from $this->table1 where fuel_type='auto diesel'";
        $query1 = $result->query($sql1);
        while($row = $query1->fetch_array()){
            $price_auto = $row['price'];
            $remain_auto = $row['eligible_amount'];
        }

        $sql2 = "select *from $this->table1 where fuel_type='octane 92'";
        $query2 = $result->query($sql2);
        while($row = $query2->fetch_array()){
            $price_92 = $row['price'];
            $remain_92 = $row['eligible_amount'];
        }

        $sql3 = "select *from $this->table1 where fuel_type='octane 95'";
        $query3 = $result->query($sql3);
        while($row = $query3->fetch_array()){
            $price_95 = $row['price'];
            $remain_95 = $row['eligible_amount'];
        }
        $sql4 = "select *from $this->table1 where fuel_type='super diesel'";
        $query4 = $result->query($sql4);
        while($row = $query4->fetch_array()){
            $price_super = $row['price'];
            $remain_super = $row['eligible_amount'];
        }

        $sql5 = "select * from $this->table limit 4";
        $query5=$result->query($sql5);
       
    
        $sql6="select *from $this->table2  where id = '".$id."' AND remark='pending'" ;
        $query6 = $result->query($sql6);

        $sql7="select *from $this->table4  where user_id = '".$id."' order by Oid DESC LIMIT 4";
        $query7 = $result->query($sql7);

        $arr=array(
       
            'vno'=> $vno,
            'vno1'=> $vno1,
            'vno2'=> $vno2,
            'sNo'=> $sNo,
            'fname'=> $fname,
            
            'points'=> $points,
            'price_auto'=> $price_auto,
            'remain_auto'=> $remain_auto,
            'price_92' => $price_92,
            'remain_92' => $remain_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'remain_super' => $remain_super,
            
                'result1'=>$query5,
                'result'=>$query6,
                'result2'=>$query7,
               
               
               
        
         
        
         
        );
        return $arr;
    }








}