<?php

class M_Profile extends Model
{
    protected $table = 'user_form';
    protected $table2 = 'registered_users';

    public function profile($data){
    

        $id = $data['id'];
        $fname=$_SESSION['CUS_first_name'];

        $result=$this->connection();
        $sql = "select * from $this->table where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $email= $row['email'];
            $points= $row['points'];
        
            
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
            'points'=>$points,
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
           


            //remove the profile 

            public function add($data){
                $result1=$this->connection();
                $delete =$data ['delete'];
                $id = $_SESSION['CUS_id'];
           
        
                $sql = "UPDATE $this->table2 SET status=0 WHERE email='".$delete."'";
              
                 $query3 = $result1->query($sql); 
        
                 if($query3){
                 
                        return 1;       
                }

               else{
                return 6;
                   }
            
              }
          }
          
    






