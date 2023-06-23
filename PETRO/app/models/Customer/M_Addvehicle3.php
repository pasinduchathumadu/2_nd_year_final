<?php 
class M_Addvehicle3 extends Model
{
    protected $table = 'user_form';
    protected $table2 = 'vehicles';
    protected $table3 = 'registered_users';


    public function addvehicle3($data){
    

        $id = $data['id'];
        $fname=$_SESSION['CUS_first_name'];

        $result=$this->connection();
        $sql = "select * from $this->table  where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
    
            $vno= $row['vno'];
            $email= $row['email'];
          

            $vno1= $row['vno1'];
       

            $sNo= $row['sNo'];
         

            $vno2= $row['vno2'];
         
            
            
          
        }


        $sql2 = "select * from $this->table3  where email='".$email."'";
        $query2=$result->query($sql2);
        while($row = $query2->fetch_array()){
    
         
         

            $phone = $row['phone'];
            
          
        }

        $arr=array(
            'vno' => $vno,
          
            'vno1' => $vno1,
          
          
            'vno2' => $vno2,
         
            'sNo' => $sNo,
         

            'phone'=>$phone,
          
        );
        return $arr;
    }

    public function add($data){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
    
        $vno2 = $data['vno2'];
        $vtype2 = $data['vtype2'];
        $ftype2 = $data['ftype2'];
        $phone = $data['phone'];
   


        $select2 =  "SELECT * FROM $this->table  WHERE vno = '".$vno2."' OR vno1='".$vno2."' OR vno2='".$vno2."'";
        $query4 = $result->query($select2);


    //check vehicle number already exist in the database
        
        if($query4->num_rows>0){

            
            $error="Vehicle Number Already Exists";

            $sql = "select * from $this->table  where id='".$id."'";
            $query=$result->query($sql);
            while($row = $query->fetch_array()){
        
                $vno= $row['vno'];
             
    
                $vno1= $row['vno1'];
               
    
                $sNo= $row['sNo'];
            
    
                $vno2= $row['vno2'];

                
                $email= $row['email'];
             
                
                
              
            }


            $sql2 = "select * from $this->table3  where email='".$email."'";
            $query2=$result->query($sql2);
            while($row = $query2->fetch_array()){
        
             
             
    
                $phone = $row['phone'];
                
              
            }
       
               $data=[
                   'vno' => $vno,
                   'vno1' => $vno1,
                   'vno2' => $vno2,
                   'sNo' => $sNo,
                   'error'=>$error,
                   'phone'=>$phone,
                 
                  
               ];
               return $data;
             }



       //check required fields are filled

                                  
        if($vno2==NULL){

            
            $error="You need to Add vehicle number";

            $sql = "select * from $this->table  where id='".$id."'";
            $query=$result->query($sql);
            while($row = $query->fetch_array()){
        
                $vno= $row['vno'];
                $email= $row['email'];
           
    
                $vno1= $row['vno1'];
              
    
                $sNo= $row['sNo'];
             
    
                $vno2= $row['vno2'];
             
                
                
              
            }


            $sql2 = "select * from $this->table3  where email='".$email."'";
            $query2=$result->query($sql2);
            while($row = $query2->fetch_array()){
        
             
             
    
                $phone = $row['phone'];
                
              
            }
       
               $data=[
                   'vno' => $vno,
                   'vno1' => $vno1,
                   'vno2' => $vno2,
                   'sNo' => $sNo,
                   'error'=>$error,
                   'phone'=>$phone,
                 
                   
       
           
   
                  
               ];
               return $data;
             }



        else{

            
        $sql1= "UPDATE $this->table SET vno2='$vno2' WHERE id='".$id."'";
        $query1 = $result->query($sql1);
   

        
        $sql4= "INSERT INTO $this->table2 (phone,vno,vtype,ftype) VALUES('$phone','$vno2','$vtype2','$ftype2')";
        $query4 = $result->query($sql4);

            return 1;
        }

          
      
    }
   }
