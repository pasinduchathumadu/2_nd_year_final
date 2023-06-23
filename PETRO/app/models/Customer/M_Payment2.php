<?php

class M_Payment2 extends Model
{
    protected $table = 'cart';
    protected $table2='finalorder';
    protected $table1='product_order';
    
 
        public function payment2($data){
            $id = $_SESSION['CUS_id'];
            
        $total=$_SESSION['total'];
        
        $address=$_SESSION['address'];
        
        $phone=$_SESSION['phone'];

        $points=$_SESSION['points'];

        $pmethod=$_SESSION['pmethod'];

            $result = $this->connection();
      

            $sql="select *from $this->table where user_id = '".$id."'";
            $query = $result->query($sql);

            $sql1="select group_concat(Oid separator ',') as Oid from $this->table where user_id = '".$id."'";
            $query1 = $result->query($sql1);
            $row = mysqli_fetch_assoc($query1);
            $Oid = $row['Oid'];
          
            
     
      
    
            $arr=array(
                'address' => $address,
                'phone' => $phone,
                'points' => $points,
                'total'=>$total,
                'pmethod'=>$pmethod,
                'result'=>$query,
                'result1'=>$Oid,
                
      
              
              
            );
            return $arr;
        }
    



    

    public function add($data){
        $result1=$this->connection();

        $total=$_SESSION['total'];
        $address=$_SESSION['address'];
        $phone=$_SESSION['phone'];
        
        $user_id=$data['user_id'];
        $address = $data['address'];
        $phone = $data['phone'];
        $total = $data['total'];
        $pmethod = $data['pmethod'];
        $pids = $data['pids'];
        $points = $data['points'];
   
 

      
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
        

        

           // $sql1 = "INSERT INTO $this->table2 (pids,user_id,address,phone,total,pmethod) VALUES
            //('$pids','$user_id', '$address','$phone','$total','$pmethod')";
            //$query4 = $result1->query($sql1); 
            //if($query4){
             
            
               //}
           }
        }

       
      
