<?php 
class M_Updatevehicle3 extends Model
{
    protected $table = 'user_form';
    protected $table3 = 'vehicles';
    protected $table4 = 'registered_users';


    public function updatevehicle3($data){
    

        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $result=$this->connection();
        $sql = "select * from $this->table  where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
    
            $vno2= $row['vno2'];
          
            $vno1= $row['vno1'];
       
            $vno= $row['vno'];
    
            $sNo= $row['sNo'];
      
            $email = $row['email'];
            
          
        }

        $sql0 = "select * from $this->table4  where email='".$email."'";
        $query0=$result->query($sql0);
        while($row = $query0->fetch_array()){
    
         
            $phone= $row['phone'];
           
         
            
          
        }


        

        $sql2 = "select * from $this->table3  where status=1 AND vno='".$vno2."'";
        $query2=$result->query($sql2);
        while($row = $query2->fetch_array()){
    
            $vno4= $row['vno'];
            $vtype4 = $row['vtype'];
            $ftype4 = $row['ftype'];
      
            
          
        }

        $arr=array(
            'vno2' => $vno4,
            'vtype2' => $vtype4,
            'ftype2' => $ftype4,
         

            'vno1' => $vno1,
            'fname'=>$fname,
          
          
            'vno' => $vno,
         
            'sNo' => $sNo,

            'phone' => $phone,
          
          
        );
        return $arr;
    }

    public function add($data){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
    
        $vno2 = $data['vno2'];
        $vtype2 = $data['vtype2'];
        $ftype2 = $data['ftype2'];
        $phone = $data['phone'];
   

        $sql1= "UPDATE $this->table SET vno2=NULL WHERE id='".$id."'";
        $query1 = $result->query($sql1);
      

        $sql4= "UPDATE $this->table3 SET status=0 WHERE  vno='".$vno2."'";
        $query4 = $result->query($sql4);


        if(($query1 && $query4)){

            return true;
        }
        else{
            return false;
        }
    }
   }
