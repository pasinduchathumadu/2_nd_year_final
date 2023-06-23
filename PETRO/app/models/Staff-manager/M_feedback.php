<?php

use LDAP\Result;

class M_feedback extends Model{

    protected $table = 'feedback';

    public function view_feedback(){
        $result = $this->connection();

        $sql="select * from feedback";

        $query = $result->query($sql);
        $VSatisfied="select count(feedback_id) AS COUNT1 from feedback where rating= 'Very Satisfied'";
        $Satisfied="select count(feedback_id) AS COUNT2 from feedback where rating= 'Satisfied'";
        $Neutral="select count(feedback_id) AS COUNT3 from feedback where rating= 'Neutral'";
        $Dissatisfied="select count(feedback_id) AS COUNT4 from feedback where rating= 'Dissatisfied'";
        $VDissatisfied="select count(feedback_id) AS COUNT5 from feedback where rating= 'Very Dissatisfied'";

        $query1 = $result->query($VSatisfied);
        while($row=$query1->fetch_array()){
            $count1=$row['COUNT1'];
        }
        $query2 = $result->query($Satisfied);
        while($row=$query2->fetch_array()){
            $count2=$row['COUNT2'];
        }
        $query3 = $result->query($Neutral);
        while($row=$query3->fetch_array()){
            $count3=$row['COUNT3'];
        }
        $query4 = $result->query($Dissatisfied);
        while($row=$query4->fetch_array()){
            $count4=$row['COUNT4'];
        }
        $query5 = $result->query($VDissatisfied);
        while($row=$query5->fetch_array()){
            $count5=$row['COUNT5'];
        }


        if($query->num_rows>0){
            $data=[
                'result'=>$query,
                'result1'=>$count1,
                'result2'=>$count2,
                'result3'=>$count3,
                'result4'=>$count4,
                'result5'=>$count5,
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