<?php

class M_Pendingstore extends Model
{
    protected $table = 'product_order';
    protected $table2 = 'finalorder';
    protected $table3 = 'ordert';
    protected $table4 = 'fuel_availability';
    public function pendingstore($data){
        $id = $_SESSION['CUS_id'];
        $fname=$_SESSION['CUS_first_name'];

        $result = $this->connection();
        $sql="select *from $this->table where user_id = '".$id."' ORDER BY Oid DESC";
        
        $query = $result->query($sql);
        

        $sql2="select *from $this->table2 where user_id = '".$id."' ORDER BY Oid DESC";
        
        $query2 = $result->query($sql2);


        $sql6="select *from $this->table3  where id = '".$id."'" ;
        $query6 = $result->query($sql6);


        if($query6->num_rows>0 || ($query2->num_rows>0||$query->num_rows>0)){
                $data=[
                    'result'=>$query,
                    'result2'=>$query2,
                    'result3'=>$query6,
                    'fname'=>$fname,
                    'error'=>'',
                ];
                return $data;
        }
        else{
            return false;
        }
    }





    public function remove($data){
        $result=$this->connection();
        $id=$data['Oid'];
        $ftype=$data['ftype'];
        
        $amount=$data['amount'];
        $sql="DELETE FROM $this->table3 where Oid='".$id."'";
        $query=$result->query($sql);

        $sql4= "UPDATE $this->table4 SET eligible_amount=eligible_amount+$amount WHERE fuel_type='".$ftype."'";
        $query4 = $result->query($sql4);
      }

}