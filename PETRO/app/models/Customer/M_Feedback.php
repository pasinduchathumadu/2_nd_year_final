<?php

class M_Feedback extends Model
{
    protected $table = 'user_form';
    protected $table2='feedback';

    
    public function feedback($data){
    

        $id = $_SESSION['CUS_id'];
        $fname = $_SESSION['CUS_first_name'];
        $result=$this->connection();
        $sql = "select * from $this->table where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $id= $row['id'];
            $email = $row['email'];
       
           
          
        }

     

        $arr=array(
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
           
        
          
          
        );
        return $arr;
    }
              
            


    public function add($data){
        $result1=$this->connection();
        $id =$_SESSION ['CUS_id'];
        $fname = $_SESSION['CUS_first_name'];
      

        $status =$data ['status'];
        $feedback =$data ['feedback'];
      
  

         $sql = "INSERT INTO $this->table2 (status,feedback) VALUES('$status','$feedback')";
         $query3 = $result1->query($sql); 

         if($query3){

         $sql = "select * from $this->table where id='".$id."'";
         $query=$result1->query($sql);
         while($row = $query->fetch_array()){
             
             $email = $row['email'];
             
            
           
         }
 
    

         $error="Your Feedback Send Successfully";
    
         $data=[
            'id' => $id,
            'email'=>$email,
            'fname'=>$fname,
            
           
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
    
           
   
            $error="Your Feedback didn't Send";
       
            $data=[
               'id' => $id,
               'email'=>$email,
               'fname'=>$fname,
               
               
                'error'=>$error,
               
            ];
            return $data;


        }

        }
           }
          
          
    






