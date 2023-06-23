<?php

class M_Email extends Model{
    protected $table='customer_manager';
    public function details(){
        $id=$_SESSION['customer_manager_id'];
        $result = $this->connection();
        $sql="select *from $this->table where customer_manager_id='".$id."'";
        $query=$result->query($sql);
        while($row = $query->fetch_assoc()){
            $email=$row['email'];
            $first=$row['First_name'];
            $last=$row['Last_name'];
        }
        $data=[
            'email'=>$email,
            'first'=>$first,
            'last'=>$last,
        ];
        return $data;
    }
}