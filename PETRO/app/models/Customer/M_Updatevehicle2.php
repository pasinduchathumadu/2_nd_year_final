<?php 
class M_Updatevehicle2 extends Model
{
    protected $table = 'user_form';
    protected $table3 = 'vehicles';
    protected $table4 = 'registered_users';


    public function updatevehicle2($data){
    

        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $result=$this->connection();
        $sql = "select * from $this->table  where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
    
            $vno1= $row['vno1'];
         
            $vno= $row['vno'];
           
            $vno2= $row['vno2'];
         
            $sNo= $row['sNo'];
        
            $email = $row['email'];
            
          
        }


        
        $sql0 = "select * from $this->table4  where email='".$email."'";
        $query0=$result->query($sql0);
        while($row = $query0->fetch_array()){
    
         
            $phone= $row['phone'];
           
         
            
          
        }


        $sql2 = "select * from $this->table3  where status=1 AND vno='".$vno1."'";
        $query2=$result->query($sql2);
        while($row = $query2->fetch_array()){
    
            $vno4= $row['vno'];
            $vtype4 = $row['vtype'];
            $ftype4 = $row['ftype'];
      
            
          
        }

        $arr=array(
            'vno1' => $vno4,
            'vtype1'=>$vtype4,
            'ftype1'=>$ftype4,
             'fname'=>$fname,
            'vno' => $vno,

            'phone' => $phone,
         
          
            'vno2' => $vno2,
          
            'sNo' => $sNo,
           
          
        );
        return $arr;
    }

    public function add($data){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
    
        $vno = $data['vno'];
        $vtype = $data['vtype'];
        $ftype = $data['ftype'];
        $phone = $data['phone'];
   

        $sql1= "UPDATE $this->table SET vno1=NULL WHERE id='".$id."'";
        $query1 = $result->query($sql1);
        
      

        $sql4= "UPDATE $this->table3 SET status=0 WHERE vno='".$vno."'";
        $query4 = $result->query($sql4);

     


        if(($query1 &&  $query4)){

            return true;
        }
        else{
            return false;
        }
    }
   }
