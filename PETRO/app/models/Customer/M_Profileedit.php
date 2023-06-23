<?php

class M_Profileedit extends Model
{
    protected $table = 'user_form';
    protected $table2 = 'registered_users';


    public function profileedit($data){
    

        $id = $data['id'];
        $fname=$_SESSION['CUS_first_name'];

        $result=$this->connection();
        $sql = "select * from $this->table where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $email= $row['email'];
         
          
            $vno = $row['vno'];
            $vno1 = $row['vno1'];
            $vno2 = $row['vno2'];
            $sNo = $row['sNo'];
          
        }

        $sql2 = "select * from $this->table2 where email='".$email."'";
        $query2=$result->query($sql2);

        while($row = $query2->fetch_array()){
            $email= $row['email'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $NIC = $row['NIC'];
        
    
            $phone = $row['phone'];
            
            $password = $row['password'];
        }


        $arr=array(
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
            'lname'=>$lname,
            'NIC'=>$NIC,
         
            'vno'=> $vno,
            'vno1'=> $vno1,
            'vno2'=> $vno2,
            'sNo'=> $sNo,
            'phone'=> $phone,
            'password'=> $password,
        );
        return $arr;
              
            }



            
    public function add($data){
     
        $id = $_SESSION['CUS_id'];


        $result=$this->connection();
        $email = $data['email'];
        $fname = $data['fname'];
        $lname = $data['lname'];
        $phone = $data['phone'];
        
        $sql1= "UPDATE $this->table2 SET fname='$fname' WHERE email='".$email."'";
        $query1 = $result->query($sql1);

           
        $sql2= "UPDATE $this->table2 SET lname='$lname' WHERE email='".$email."'";
        $query2 = $result->query($sql2);

   
        $select2 =  "SELECT * FROM $this->table2  WHERE phone = '".$phone."'";
        $query2 = $result->query($select2);


//check mobile number already exist in the database

                    
    if($query2->num_rows>0){

        
        $error="Mobile Number Already Exists";

        $sql = "select * from $this->table  where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $email= $row['email'];
          
          
            $vno = $row['vno'];
            $vno1 = $row['vno1'];
            $vno2 = $row['vno2'];
            $sNo = $row['sNo'];
        
            
          
        }



                
        $sql2 = "select * from $this->table2 where email='".$email."'";
        $query2=$result->query($sql2);

        while($row = $query2->fetch_array()){
            $email= $row['email'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $NIC = $row['NIC'];
        
    
            $phone = $row['phone'];
            
            $password = $row['password'];
        }
   
           $data=[
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
            'lname'=>$lname,
            'NIC'=>$NIC,
         
            'vno'=> $vno,
            'vno1'=> $vno1,
            'vno2'=> $vno2,
            'sNo'=> $sNo,
            'phone'=> $phone,
            'password'=> $password,
               'error'=>$error,
             
               
   
       

              
           ];
           return $data;
         }



         if(strlen('$phone')!=10){

        
            $error="Incorrect required length";
    
            $sql = "select * from $this->table  where id='".$id."'";
            $query=$result->query($sql);
            while($row = $query->fetch_array()){
                $email= $row['email'];
              
              
                $vno = $row['vno'];
                $vno1 = $row['vno1'];
                $vno2 = $row['vno2'];
                $sNo = $row['sNo'];
            
                
              
            }
    
    
    
                    
            $sql2 = "select * from $this->table2 where email='".$email."'";
            $query2=$result->query($sql2);
    
            while($row = $query2->fetch_array()){
                $email= $row['email'];
                $fname = $row['fname'];
                $lname = $row['lname'];
                $NIC = $row['NIC'];
            
        
                $phone = $row['phone'];
                
                $password = $row['password'];
            }
       
               $data=[
                'id' => $id,
                'email'=>$email,
                'fname'=>$fname,
                'lname'=>$lname,
                'NIC'=>$NIC,
             
                'vno'=> $vno,
                'vno1'=> $vno1,
                'vno2'=> $vno2,
                'sNo'=> $sNo,
                'phone'=> $phone,
                'password'=> $password,
                   'error'=>$error,
                 
                   
       
           
    
                  
               ];
               return $data;
             }


         else{

            
                
        $sql3= "UPDATE $this->table2 SET phone='$phone' WHERE email='".$email."'";
        $query3 = $result->query($sql3);

  

        return 1;

         }
    
       
      
      




    
   
        }  
  
}
           
          
          
    






