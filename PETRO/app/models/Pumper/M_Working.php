<?php

class M_Working extends Model
{
    protected $table = 'complete_order';
    public function details_working($data){
        $pumper_id = $_SESSION['id'];
        $result = $this->connection();
        $count=0;
        $total=0;

        $sql="select count(distinct order_id)AS COUNT,count(order_id)AS total from $this->table where pumper_id = '".$pumper_id."'ORDER BY ID DESC LIMIT 8";
        $query = $result->query($sql);

        if($query->num_rows>0){

            while($row=$query->fetch_array())
            {
                $count=$row['COUNT'];
                $total=$row['total'];
            
            }
        }
     

      

        $sql="select *from $this->table where pumper_id = '".$pumper_id."'ORDER BY ID DESC LIMIT 8";
        $query = $result->query($sql);

       
        if($query->num_rows>0){

    
            $data=[
                'result'=>$query,
                'COUNT'=>$count,
                'total'=>$total,
                
                'error'=>'',
            ];
            return $data;
    }
    else{
        $data=[
            'COUNT'=>$count,
            'total'=>$total,
            
            'error'=>'No Records',
        ];
        return $data;
    }
    
    }
    public function previous1($data){
        $from = $data['from'];
        $to =$data['to'];
        $pumper_id = $_SESSION['id'];
        $result = $this->connection();
        $count=0;
        $total=0;

        $sql="select count(distinct order_id)AS COUNT,count(order_id)AS total from $this->table where pumper_id = '".$pumper_id."'AND(time>='".$from."' AND time<'".$to."')";
        $query = $result->query($sql);

        if($query->num_rows>0){

            while($row=$query->fetch_array())
            {
                $count=$row['COUNT'];
                $total=$row['total'];
            
            }
        }

        $sql="select *from $this->table where pumper_id = '".$pumper_id."' AND(time>='".$from."' AND time<='".$to."')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'COUNT'=>$count,
                'total'=>$total,
                'error'=>'',
            ];
            return $data;
        }
        else{
            $data=[
               
                'COUNT'=>$count,
                'total'=>$total,
                'error'=>'No Records..!!',
            ];
            return $data;
        }

    }
}