<?php

class M_Complaint extends Model
{
    protected $table = 'user_form';
    protected $table2='complain';

    
    public function complaint($data){
    

        $id = $_SESSION['CUS_id'];
        $fname = $_SESSION['CUS_first_name'];
        $result=$this->connection();
        $sql = "select * from $this->table where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $id= $row['id'];
            $email = $row['email'];
       
           
          
        }

        $sql6="select *from $this->table2  where user_id = '".$id."'" ;
        $query6 = $result->query($sql6);

        $arr=array(
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
           
            'result'=>$query6,
          
          
        );
        return $arr;
    }
              
            


    public function add($data){
        $result1=$this->connection();
        $id =$_SESSION ['CUS_id'];
        $fname = $_SESSION['CUS_first_name'];
      

        $complaint =$data ['complaint'];
      
  

         $sql = "INSERT INTO $this->table2 (user_id,complain) VALUES('$id','$complaint')";
         $query3 = $result1->query($sql); 

         if($query3){

         $sql = "select * from $this->table where id='".$id."'";
         $query=$result1->query($sql);
         while($row = $query->fetch_array()){
             
             $email = $row['email'];
             
            
           
         }
 
         $sql6="select *from $this->table2  where user_id = '".$id."'" ;
         $query6 = $result1->query($sql6);

         $error="Your Complaint Send Successfully";
    
         $data=[
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
            
            'result'=>$query6,
             'error'=>$error,
            
         ];
         return $data;
        }

        else{
            $sql = "select * from $this->table where id='".$id."'";
            $query=$result1->query($sql);
            while($row = $query->fetch_array()){
                
                $email = $row['email'];
                
               
              
            }
    
            $sql6="select *from $this->table2  where user_id = '".$id."'" ;
            $query6 = $result1->query($sql6);
   
            $error="Your Complaint didn't Send";
       
            $data=[
               'id' => $id,
               'email'=>$email,
               'fname'=>$fname,
               
               'result'=>$query6,
                'error'=>$error,
               
            ];
            return $data;


        }

        }
           }
          
          
    






