<?php 
class M_Updatevehicle1 extends Model
{
    protected $table = 'user_form';
    protected $table2 = 'removevm';
    protected $table3 = 'vehicles';
    protected $table4 = 'registered_users';


    public function updatevehicle1($data){
    

        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
        $result=$this->connection();
        $sql = "select * from $this->table  where id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
    
            $vno= $row['vno'];
        
            $vno1= $row['vno1'];
         
            $vno2= $row['vno2'];
         
            $sNo= $row['sNo'];

            $email= $row['email'];
           
         
            
          
        }


        $sql0 = "select * from $this->table4  where email='".$email."'";
        $query0=$result->query($sql0);
        while($row = $query0->fetch_array()){
    
         
            $phone= $row['phone'];
           
         
            
          
        }

        $sql2 = "select * from $this->table3  where status=1 AND vno='".$vno."'";
        $query2=$result->query($sql2);
        while($row = $query2->fetch_array()){
    
            $vno4= $row['vno'];
            $vtype4 = $row['vtype'];
            $ftype4 = $row['ftype'];
      
            
          
        }

        $arr=array(
            
            'vno1' => $vno1,
        
          
            'vno2' => $vno2,
        
            'sNo' => $sNo,
         

            'vno' => $vno4,
            'vtype'=>$vtype4,
            'ftype'=>$ftype4,

            'phone'=>$phone,
            'fname'=>$fname,

        
          
          
        );
        return $arr;
    }

    public function add($data){
        $result=$this->connection();
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];
    
        $vno = $data['vno'];
        $vtype = $data['vtype'];
        $ftype = $data['ftype'];
        $phone = $data['phone'];
   

        $sql1= "UPDATE $this->table SET vno=NULL WHERE id='".$id."'";
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
