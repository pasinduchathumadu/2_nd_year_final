<?php

class M_Dis_Email extends Model{
    protected $table='distribution_manager';
    public function details(){
        $id=$_SESSION['distribution_manager_id'];
        $result = $this->connection();
        $sql="select *from $this->table where distribution_manager_id='".$id."'";
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