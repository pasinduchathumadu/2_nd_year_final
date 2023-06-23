<?php

use LDAP\Result;

class M_complain extends Model{

    protected $table = 'complain';

    public function edit_complain(){
        $result = $this->connection();

        $sql="select * from complain";
        $query = $result->query($sql);
        
        $Viewed="select count(com_id) AS COUNT1 from complain where status= 'Viewed'";
        $Pending="select count(com_id) AS COUNT2 from complain where status= 'Pending'";
        $Replied="select count(com_id) AS COUNT3 from complain where status= 'Replied'";

        $query1 = $result->query($Viewed);
        while($row=$query1->fetch_array()){
            $count1=$row['COUNT1'];
        }
        $query2 = $result->query($Pending);
        while($row=$query2->fetch_array()){
            $count2=$row['COUNT2'];
        }
        $query3 = $result->query($Replied);
        while($row=$query3->fetch_array()){
            $count3=$row['COUNT3'];
        }


        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'result1'=>$count1,
                'result2'=>$count2,
                'result3'=>$count3,
                'error'=>'',
            ];
            //echo $data["result1"];
            return $data;
        }
        else{
            return false;
        }
        
    }

    

    
}