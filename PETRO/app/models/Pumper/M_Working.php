<?php

class M_Working extends Model
{
    protected $table = 'complete_order';
    public function details_working($data){
        $pumper_id = $_SESSION['id'];
        $result = $this->connection();
       
      
//execute query
        $sql="select *from $this->table where pumper_id = '".$pumper_id."' AND DATE(time)=CURRENT_DATE() ORDER BY ID DESC limit 12 ";
        $query = $result->query($sql);

       
        if($query->num_rows>0){

    
            $data=[
                'result'=>$query,
               
                'date'=>'Today',
                'ID'=>$pumper_id,
                
                'error'=>'',
            ];
            return $data;
    }
    //no records
    else{
        $data=[
            
            'date'=>'Today',
            'ID'=>$pumper_id,
            
            'error'=>'No Records',
        ];
        return $data;
    }
    
    }
    public function previous1($data){
        $from = $data['from'];
        $to =$data['to'];
        $pumper_id = $_SESSION['id'];
        //concatination both dates
        $date = $from.'-'.$to;
        $result = $this->connection();
      //execute the query
        $sql="select *from $this->table where (pumper_id = '".$pumper_id."') AND(DATE(time)>='".$from."' AND DATE(time)<='".$to."')";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $data=[
                'ID'=>$pumper_id,
                'result'=>$query,
                
                'date'=>$date,
                'error'=>'',
            ];
            return $data;
        }
        //no records
        else{
            $data=[
                'ID'=>$pumper_id,
                
                'date'=>$date,
                'error'=>'No Records..!!',
            ];
            return $data;
        }

    }
    



    
}