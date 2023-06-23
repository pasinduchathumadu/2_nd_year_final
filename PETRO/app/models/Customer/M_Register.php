<?php

class M_Register extends Model
{
    protected $table='user_form';

   protected $table1 = 'registered_users';
   protected $table2 = 'vehicles';
   protected $table3 = 'machines';

    public function register($data){

        $fname = $data ['fname'];
        $lname = $data ['lname'];
     
        $email =$data['email'];
        
        $NIC =$data['NIC'];
        $phone =$data ['phone'];
        $vno =$data ['vno'];
        $vtype =$data ['vtype'];
        $ftype =$data ['ftype'];
        
   
        
        $pass =$data ['pass'];
        $cpass =$data ['cpass'];


     $result = $this->connection();
    $select =  "SELECT * FROM $this->table WHERE email = '".$email."'";
    $query1 = $result->query($select);

    $select3 =  "SELECT * FROM $this->table1 WHERE phone = '".$phone."'";
    $query3 = $result->query($select3);

    
    $select4 =  "SELECT * FROM $this->table1 WHERE NIC = '".$NIC."'";
    $query4 = $result->query($select4);
    
    $select2 =  "SELECT * FROM $this->table  WHERE vno = '".$vno."' OR vno1='".$vno."' OR vno2='".$vno."'";
    $query2 = $result->query($select2);
    

    if($query1->num_rows>0){
        return 2;

   }

   if($query3->num_rows>0){
      return 5;

 }



if($NIC==NULL ){
   return 7;

}

if(strlen("$NIC")!=10){
   return 10;

}

if(strlen("$pass")<=7){
   return 11;

}






   if($query2->num_rows>0){
    
      return 3;
    }
    
      if($pass != $cpass){
        return 4;
      }

      else{
         $password=password_hash($pass,PASSWORD_BCRYPT);
         $insert = "INSERT INTO $this->table (email,vno,points) VALUES( '$email','$vno','$points')";
         $query3 = $result->query($insert); 
         $sql = "INSERT INTO $this->table1 (email,password,fname,lname,NIC,phone,role,status)values('$email','$password','$fname','$lname','$NIC','$phone','customer',1)";
         $connect = $result->query($sql);
         $sql4= "INSERT INTO $this->table2 (phone,vno,vtype,ftype) VALUES('$phone','$vno','$vtype','$ftype')";
         $query4 = $result->query($sql4);

       
     
      
           
            return 1;
        
         
      }
   }










     
     

       }     
