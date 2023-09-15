<?php
    

class M_Available extends Model
{
    protected $table = 'products';
    protected $table1='fuel_availability';
  

    public function available($data){
    


    
        $result=$this->connection();
  


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

        $sql5 = "select * from $this->table";
        $query5=$result->query($sql5);
       
    
    

        $arr=array(
       
       
            'price_auto'=> $price_auto,
            'remain_auto'=> $remain_auto,
            'price_92' => $price_92,
            'remain_92' => $remain_92,
            'price_95' => $price_95,
            'remain_95' => $remain_95,
            'price_super' => $price_super,
            'remain_super' => $remain_super,
            
                'result1'=>$query5,
            
               
               
               
        
         
        
         
        );
        return $arr;
    }








}