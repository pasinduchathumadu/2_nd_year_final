<?php 
class M_Addvehicle2 extends Model
{
    protected $table = 'user_form';
    protected $table2 = 'vehicles';
    protected $table3 = 'registered_users';


    public function addvehicle2($data){
    

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
    
        $vno1 = $data['vno1'];
        $vtype1 = $data['vtype1'];
        $ftype1 = $data['ftype1'];
        $phone = $data['phone'];
   


        $select2 =  "SELECT * FROM $this->table  WHERE vno = '".$vno1."' OR vno1='".$vno1."' OR vno2='".$vno1."'";
        $query4 = $result->query($select2);


  //check vehicle number already exist in the database
        
        if($query4->num_rows>0){

            
            $error="Vehicle Number Already Exists";

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
                   'phone'=>$phone,
                   'error'=>$error,
                
     
               ];
               return $data;
             }



                         
             
       //check required fields are filled

        if($vno1==NULL){

            
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

            
        $sql1= "UPDATE $this->table SET vno1='$vno1' WHERE id='".$id."'";
        $query1 = $result->query($sql1);
  

        $sql4= "INSERT INTO $this->table2 (phone,vno,vtype,ftype) VALUES('$phone','$vno1','$vtype1','$ftype1')";
        $query4 = $result->query($sql4);

            return 1;
        }

          
      
    }
   }
