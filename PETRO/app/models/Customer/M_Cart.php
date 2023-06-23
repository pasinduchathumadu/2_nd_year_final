<?php

class M_Cart extends Model
{
    protected $table = 'cart';
    protected $table1='product_order';
    protected $table2='finalorder';
    protected $table3='user_form';
    protected $table4='products';

    
 
        public function cart($data){
            $id = $_SESSION['CUS_id'];
            $fname=$_SESSION['CUS_first_name'];
            $result = $this->connection();

            $sql="DELETE FROM $this->table where DATE(odt)<CURRENT_DATE()";
            $query=$result->query($sql);
            //remove items from the cart when 1 day old

            $sql="select *from $this->table where user_id = '".$id."'";
            $query = $result->query($sql);
            $sql1="select group_concat(Oid separator ',') as Oid from $this->table where user_id = '".$id."'";
            $query1 = $result->query($sql1);
            $row = mysqli_fetch_assoc($query1);
            $Oid = $row['Oid'];

            

        $sql30 = "select * from $this->table3 where id='".$id."'";
        $query30=$result->query($sql30);



         if($query30->num_rows>0){
         while($row = $query30->fetch_array()){
             $points= $row['points'];
        
       
      
         }
        }
            

        $sql0="select COUNT(Oid) AS count FROM $this->table where user_id = '".$id."'";
        $query0 = $result->query($sql0);
        
        while($row=$query0->fetch_array()){
            $count1=$row['count'];
        }
    
        
       

            
            if($query->num_rows>0 && $query30->num_rows>0 ){
                    $data=[
                        'result'=>$query,
                        'result1'=>$Oid,
                        'points'=>$points,
                        'count1'=>$count1,
                        'fname'=>$fname,
                        'id'=>$id,
                        'error'=>'',
                    ];
                    return $data;
            }
            else{
                return false;
            }

                    
     

 
    
        }



        public function add($data){
            $result1=$this->connection();

            $id = $_SESSION['CUS_id'];
            $fname=$_SESSION['CUS_first_name'];

            $total=$_SESSION['total'];
            $address=$_SESSION['address'];
            $phone=$_SESSION['phone'];
            $points=$_SESSION['points'];
            $pmethod=$_SESSION['pmethod'];
            
            $user_id=$data['user_id'];
            $address = $data['address'];
            $phone = $data['phone'];
            $total = $data['total'];
            $pmethod = $data['pmethod'];
            $pids = $data['pids'];
            $points = $data['points'];
       

            if($phone==NULL){


                $id = $_SESSION['CUS_id'];
           
    
                $sql="DELETE FROM $this->table where DATE(odt)<CURRENT_DATE()";
                $query=$result1->query($sql);
                $sql="select *from $this->table where user_id = '".$id."'";
                $query = $result1->query($sql);
                $sql1="select group_concat(Oid separator ',') as Oid from $this->table where user_id = '".$id."'";
                $query1 = $result1->query($sql1);
                $row = mysqli_fetch_assoc($query1);
                $Oid = $row['Oid'];
    
                
    
            $sql30 = "select * from $this->table3 where id='".$id."'";
            $query30=$result1->query($sql30);
    
    
    
             if($query30->num_rows>0){
             while($row = $query30->fetch_array()){
                 $points= $row['points'];
            
           
          
             }
            }
                
    
            $sql0="select COUNT(Oid) AS count FROM $this->table where user_id = '".$id."'";
            $query0 = $result1->query($sql0);
            
            while($row=$query0->fetch_array()){
                $count1=$row['count'];
            }
        
            
           
    
                
            
                        $data=[
                            'result'=>$query,
                            'result1'=>$Oid,
                            'points'=>$points,
                            'count1'=>$count1,
                            'id'=>$id,
                            'error'=>'',
                            'erro'=>'These fields are required to be filled!',
                        ];
                        return $data;
                



            }

             if($pmethod=="Cash"){
                $sql1 = "INSERT INTO $this->table2 (pids,user_id,address,phone,total,pmethod,used_points) VALUES
                ('$pids','$user_id', '$address','$phone','$total','$pmethod','$points')";
                $query4 = $result1->query($sql1); 
        
    
       
                $sql = "INSERT INTO $this->table1 SELECT * FROM $this->table where user_id='".$user_id."'";
                 $query3 = $result1->query($sql); 
    
                 $sql2 = "DELETE from $this->table where user_id='".$user_id."'";
                 $query5 = $result1->query($sql2); 
             if(($query3 && $query4) && $query5){
              
                return 1;
                }
            }

            
            if($pmethod=="Card"){
                $total=$_SESSION['total'];
                $points=$_SESSION['points'];
                $pmethod=$_SESSION['pmethod'];

            
                return 2;
               // $sql1 = "INSERT INTO $this->table2 (pids,user_id,address,phone,total,pmethod) VALUES
                //('$pids','$user_id', '$address','$phone','$total','$pmethod')";
                //$query4 = $result1->query($sql1); 
                //if($query4){
                 
                
                   //}
               }


           
          }









          public function remove($data){
            $result=$this->connection();
            $id=$data['O_ID'];
            $p_id=$data['p_id'];
            $quantity=$data['quantity'];
            $sql="DELETE FROM $this->table where Oid='".$id."'";
            $query=$result->query($sql);

            $sql4= "UPDATE $this->table4 SET quantity=quantity+$quantity WHERE p_id='".$p_id."'";
            $query4 = $result->query($sql4);
          }


          public function update($data){
            $result=$this->connection();
            $id=$data['O_ID'];
            $p_id=$data['p_id'];
            $quantity=$data['quantity'];
            $sql="UPDATE $this->table SET quantity='$quantity' WHERE Oid='".$id."'";
            $query=$result->query($sql);

            $sql4= "UPDATE $this->table4 SET quantity=quantity+$quantity WHERE p_id='".$p_id."'";
            $query4 = $result->query($sql4);
          }
    }
              
            


              
           
          
          
    






