<?php
class M_Complain extends Model{
    protected $table='complain';

    public function complain(){
        $result=$this->connection();
        $count_1=0;
        $count_2=0;
        $sql="select *from $this->table where status = 'Pending'";
        $query=$result->query($sql);
        $sql="select *from $this->table where status = 'Replied'";
        $query2=$result->query($sql);
        $sql="select COUNT(com_id) AS COM_ID from $this->table where status = 'Pending'";
        $query1=$result->query($sql);
        if($query1->num_rows>0){
            while($row=$query1->fetch_array()){
                $count_2+=$row['COM_ID'];
            }
        }
        else{
            $count_2=0;
        }
        $sql="select COUNT(com_id) AS COM_ID from $this->table where status = 'Replied'";
        $query1=$result->query($sql);
        if($query1->num_rows>0){
            while($row=$query1->fetch_array()){
                $count_1+=$row['COM_ID'];
            }

        }
        else{
            $count_1=0;
        }
       
       
    
        if($query->num_rows>0){
           
            $data=[
                'result'=>$query,
                'result1'=>$query2,
                'empty'=>1,
                'count1'=>$count_1,
                'count2'=>$count_2,
            ];
            return $data;
        }
        else{
            $data=[
                'count1'=>$count_1,
                'count2'=>$count_2,
                'empty'=>0,
            ];
            return $data;
        }

    }

    public function load($data){
        $result=$this->connection();
        $id = $data['com_id'];
        $O_ID = "COM ".$id;

       

       

        
    
        $sql="select *from $this->table WHERE com_id = '".$id."' AND status='pending'";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $id=$row['com_id'];
                $user = $row['user_id'];
                $complain =$row['complain'];
                $c_date = $row['date_time'];

            }
            $data = [
                'id'=>$O_ID,
                'user'=>$user,
                'complain'=>$complain,
                'c_date'=>$c_date,
            ];
            return $data;
        }
        
    }
    public function reply($data){
        $result=$this->connection();
        $id = $data['com_id'];
        $O_ID = "COM ".$id;

       

        
    
        $sql="select *from $this->table WHERE com_id = '".$id."' AND status='Replied'";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $id=$row['com_id'];
                $user = $row['user_id'];
                $complain =$row['complain'];
                $c_date = $row['date_time'];
                $response = $row['response'];

            }
            $data = [
                'id'=>$O_ID,
                'user'=>$user,
                'complain'=>$complain,
                'c_date'=>$c_date,
                'response'=>$response,
            ];
            return $data;
        }
    }
    public function register($data){
        $result=$this->connection();
        $response=$data['response'];
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $id=$data['id'];
        $response=$data['response'];

        
       
        $sql="UPDATE $this->table SET response='".$response."',status='Replied',response_date='".$date."' WHERE com_id='".$id."'";
        $query=$result->query($sql);

    }
}