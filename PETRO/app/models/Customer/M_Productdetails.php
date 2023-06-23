<?php

class M_Productdetails extends Model
{
    protected $table = 'products';
    protected $table1='cart';


    public function productdetails($data){
        $result=$this->connection();
    

        $p_id=$_SESSION['p_id'];
      
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $sql = "SELECT *FROM $this->table where p_id='".$p_id."'";
        $query3 = $result->query($sql); 

        while($row=$query3->fetch_array()){
            $p_id = $row['p_id'];
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
            $dis = $row['description'];
           
        }


        //get count of the cart
        
        $select2 =  "SELECT COUNT(Oid)AS count FROM $this->table1  WHERE user_id = '".$id."'";
        $query2 = $result->query($select2);
       

           while($row=$query2->fetch_array()){
               $count1=$row['count'];
           }
       

        $data = [
            'p_id'=>$p_id,
            'name'=>$name,
            'price'=>$price,
            'image'=>$image,
            'description'=>$dis,
            'count1'=>$count1,
            'fname'=>$fname,
           
        ];
        return $data;
    }
        
    

    //add data to the cart
            


        public function add($data){
            $result=$this->connection();
            $id = $_SESSION['CUS_id'];
            $fname=$_SESSION['CUS_first_name'];

            $p_id=$data['p_id'];
            $image = $data['product_image'];
            $product_name = $data['product_name'];
            $product_price = $data['product_price'];
            $product_quantity = $data['product_quantity'];
            $id = $_SESSION['CUS_id'];
         
            $p_id=$_SESSION['p_id'];
      
            
            $sql = "SELECT *FROM $this->table where p_id='".$p_id."'";
            $query3 = $result->query($sql); 
            while($row=$query3->fetch_array()){
            
                $dis = $row['description'];
               
            }
    

            $select2 =  "SELECT COUNT(Oid)AS count FROM $this->table1  WHERE user_id = '".$id."'";
            $query2 = $result->query($select2);
           
    
               while($row=$query2->fetch_array()){
                   $count1=$row['count'];
               }
     

            $select3 =  "SELECT quantity AS count3 FROM $this->table  WHERE p_id = '".$p_id."'";
            $query4 = $result->query($select3);
        
    
               while($row=$query4->fetch_array()){
                   $count3=$row['count3'];
               }

               if($count3<=0){


                $sql = "select * from $this->table1";
                $query=$result->query($sql);
    
    
                $error="Sorry!!! This Product is Out of Stock !";
        
                $data=[
                    'p_id' => $p_id,
                    'user_id'=>$id,
                    'name'=>$product_name,
                    'price'=>$product_price,
                    'image'=>$image,
                    'description'=>$dis,
                    
                    'count1'=>$count1,
                    
                
                    'fname'=>$fname,
                    'result1'=>$query,
                    'error'=>$error,
                   
                ];
                return $data;

               }

            



           else{
          
         
            $sql = "INSERT INTO $this->table1 (user_id,p_id,name,price,quantity,image) VALUES
            ('$id', '$p_id','$product_name','$product_price','$product_quantity','$image')";
            $query3 = $result->query($sql); 

            $sql4= "UPDATE $this->table SET quantity=quantity-$product_quantity WHERE p_id='".$p_id."'";
            $query4 = $result->query($sql4);
    
            $sql = "select * from $this->table1";
            $query=$result->query($sql);

            $select2 =  "SELECT COUNT(Oid)AS count FROM $this->table1  WHERE user_id = '".$id."'";
            $query2 = $result->query($select2);
        
    
               while($row=$query2->fetch_array()){
                   $count1=$row['count'];
               }

            $error="Product Added to the cart !";
    
            $data=[
                'p_id' => $p_id,
                'user_id'=>$id,
                'name'=>$product_name,
                'price'=>$product_price,
                'image'=>$image,
                'count1'=>$count1,
                'description'=>$dis,
                'fname'=>$fname,
                
            
            
                'result1'=>$query,
                'error'=>$error,
               
            ];
            return $data;
    
    
           
        }}}
    

        
    
    






