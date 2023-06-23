<?php 
    class M_Analyze extends Model{
       

        protected $table = 'ordert';
        protected $table2 = 'complete_order';
        protected $table4='fuel_availability';
        protected $table5='user_form';

        public function Analyze($data){

            $result=$this->connection();
            $id=$_SESSION['CUS_id'];
            $fname=$_SESSION['CUS_first_name'];
           $id1=$data['loading'];
           if($id1==0){

    $No = 0;

    $startDate = 0;
    $finishDate = 0;
}
else{
            $No = $data['No'];
            
            $startDate = NULL;
            $finishDate = NULL;

            $startDate = $data['startDate'];
            $finishDate = $data['finishDate'];
            $Date = $startDate.' TO '.$finishDate;

}
            $total=0;
            $totalamount=0;
            $price_super = 0;
            $remain_super=0;

            $alltotal=0;
            $alltotalprice=0;
            
            $alltotal92=0;
            
            $alltotal95=0;
            
            $alltotalsd=0;
            
            $alltotalad=0;

            $Date = $startDate.' TO '.$finishDate;


            $sql7 = "select *from $this->table4 where fuel_type='auto diesel'";
        $query7 = $result->query($sql7);
        while($row = $query7->fetch_array()){
            $price_auto = $row['price'];
            $remain_auto = $row['eligible_amount'];
        
        }

        $sql8 = "select *from $this->table4 where fuel_type='octane 92'";
        $query8 = $result->query($sql8);
        while($row = $query8->fetch_array()){
            $price_92 = $row['price'];
            $remain_92 = $row['eligible_amount'];
        }

        $sql9 = "select *from $this->table4 where fuel_type='octane 95'";
        $query9 = $result->query($sql9);
        while($row = $query9->fetch_array()){
            $price_95 = $row['price'];
            $remain_95 = $row['eligible_amount'];
        }
        $sql10 = "select *from $this->table4 where fuel_type='super diesel'";
        $query10 = $result->query($sql10);
        while($row = $query10->fetch_array()){
            $price_super = $row['price'];
            $remain_super = $row['eligible_amount'];
        }



        $sql11 = "select * from $this->table5  where id='".$id."'";
        $query11=$result->query($sql11);
        while($row = $query11->fetch_array()){
    
            $sNo= $row['sNo'];
   

            $vno1= $row['vno1'];
          
            $vno= $row['vno'];
       
            $vno2= $row['vno2'];
          
            
          
        }


        $sql12="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."'";
        $query12=$result->query($sql12);
     
      
        if($query12->num_rows>0){
          
            while($row=$query12->fetch_array()){
                $alltotal+=$row['pumped_liters'];
            }
        }


        
        $sql13="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."'";
        $query13=$result->query($sql13);
     
      
        if($query13->num_rows>0){
          
            while($row=$query13->fetch_array()){
                $alltotalprice+=$row['pay'];
            }
        }

        
        $sql12="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."' AND Fuel_Type='octane 92'";
        $query12=$result->query($sql12);
     
      
        if($query12->num_rows>0){
          
            while($row=$query12->fetch_array()){
                $alltotal92+=$row['pumped_liters'];
            }
        }

        $sql12="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."' AND Fuel_Type='octane 95'";
        $query12=$result->query($sql12);
     
      
        if($query12->num_rows>0){
          
            while($row=$query12->fetch_array()){
                $alltotal95+=$row['pumped_liters'];
            }
        }

        $sql12="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."' AND Fuel_Type='super diesel'";
        $query12=$result->query($sql12);
     
      
        if($query12->num_rows>0){
          
            while($row=$query12->fetch_array()){
                $alltotalsd+=$row['pumped_liters'];
            }
        }

        $sql12="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND user_id='".$id."' AND Fuel_Type='auto diesel'";
        $query12=$result->query($sql12);
     
      
        if($query12->num_rows>0){
          
            while($row=$query12->fetch_array()){
                $alltotalad+=$row['pumped_liters'];
            }
        }

        
 











                $sql="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND vehicle_no='".$No."'";
                $query=$result->query($sql);
             
              
                if($query->num_rows>0){
                  
                    while($row=$query->fetch_array()){
                        $total+=$row['amount'];
                    }
                }

                $sql="SELECT *FROM $this->table2 WHERE (DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."') AND vehicle_no='".$No."'";
                $query=$result->query($sql);
             
              
                if($query->num_rows>0){
                  
                    while($row=$query->fetch_array()){
                        $totalamount+=$row['price'];
                    }
                }

                $sql="select *FROM $this->table2 where vehicle_no='".$No."' AND (Fuel_Type='octane 92' OR Fuel_Type='octane 95')";
                $query=$result->query($sql);
                $total1=0;
                $total2=0;
                $total3=0;
                $total4=0;
                if($query->num_rows>0){
                    $sql="SELECT *FROM $this->table2 WHERE DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."' AND vehicle_no='".$No."' AND Fuel_Type='octane 92'";
                    $query=$result->query($sql);
                   
                    if($query->num_rows>0){
                        while($row=$query->fetch_array()){
                            $total1+=$row['amount'];
                        }
                    }
                    $sql="SELECT *FROM $this->table2 WHERE DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."' AND vehicle_no='".$No."' AND Fuel_Type='octane 95'";
                    $query=$result->query($sql);
                   
                    if($query->num_rows>0){
                        while($row=$query->fetch_array()){
                            $total2+=$row['amount'];
                        }
                    }

                }

                else{
                    $sql="SELECT *FROM $this->table2 WHERE DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."' AND vehicle_no='".$No."' AND Fuel_Type='auto diesel'";
                    $query=$result->query($sql);
                   
                    if($query->num_rows>0){
                        while($row=$query->fetch_array()){
                            $total3+=$row['amount'];
                        }
                    }
                    $sql="SELECT *FROM $this->table2 WHERE DATE(time)>='".$startDate."' AND DATE(time)<='".$finishDate."' AND vehicle_no='".$No."' AND Fuel_Type='super diesel'";
                    $query=$result->query($sql);
                   
                    if($query->num_rows>0){
                        while($row=$query->fetch_array()){
                            $total4+=$row['amount'];
                        }
                    }

                }

                
                $data=[
                    'total'=>$total,
                    'total1'=>$total1,
                    'total2'=>$total2,
                    'total3'=>$total3,
                    'total4'=>$total4,
                    'alltotal'=>$alltotal,
                    'totalamount'=>$totalamount,
                    'price_auto'=> $price_auto,
                    'remain_auto'=> $remain_auto,
                    'price_92' => $price_92,
                    'remain_92' => $remain_92,
                    'price_95' => $price_95,
                    'remain_95' => $remain_95,
                    'price_super' => $price_super,
                    'remain_super' => $remain_super,

                    'alltotal92'=>$alltotal92,
                    'alltotal95'=>$alltotal95,
                    'alltotalsd'=>$alltotalsd,
                    'alltotalad'=>$alltotalad,
                    'alltotalprice'=>$alltotalprice,
                    
                    'No' => $No,
                    'startDate' => $startDate,
                    'finishDate' => $finishDate,
                    'Date' => $Date,
                    'fname' => $fname,
             


                  
                        'sNo' => $sNo,
                       
            
                        'vno1' => $vno1,
                    
                      
                        'vno2' => $vno2,
                   
            
                        'vno' => $vno,
                    
                    
                ];
                return $data;
        }
    }
?>