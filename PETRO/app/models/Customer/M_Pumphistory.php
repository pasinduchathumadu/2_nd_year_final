<?php

class M_Pumphistory extends Model
{
    protected $table = 'ordert';
    protected $table2 = 'complete_order';
    public function pumphistory($data){
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $result = $this->connection();
        $sql="select *from $this->table2 where user_id = '".$id."' ORDER BY order_id DESC";


        
        $query = $result->query($sql);


                $data=[
                    'result'=>$query,
                    'fname'=>$fname,
                    'error'=>'',
                ];
                return $data;
        }
      
    }




        

           


       
      

