<?php

class M_Storehistory extends Model
{
    protected $table = 'product_order';
    protected $table2 = 'finalorder';
    public function storehistory($data){
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $result = $this->connection();
        $sql="select *from $this->table where user_id = '".$id."' AND status=1 ORDER BY Oid DESC";
        
        $query = $result->query($sql);
        

        $sql2="select *from $this->table2 where user_id = '".$id."' AND status=1 ORDER BY Oid DESC";
        
        $query2 = $result->query($sql2);


      
                $data=[
                    'result'=>$query,
                    'result2'=>$query2,
                    'fname'=>$fname,
                    'error'=>'',
                ];
                return $data;
        }
     
    }
