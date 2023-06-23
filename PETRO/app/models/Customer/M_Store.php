<?php

class M_Store extends Model
{
    protected $table = 'products';
    protected $table1 ='productdetails';
    protected $table2 ='user_form';
    protected $table3 ='cart';

    public function store($data){
    

        $id = $_SESSION['CUS_id'];
        $result=$this->connection();
        $sql = "select * from $this->table where quantity >=1";
        $query=$result->query($sql);

        $fname=$_SESSION['CUS_first_name'];

        $select2 =  "SELECT COUNT(Oid)AS count FROM $this->table3 WHERE user_id = '".$id."'";
        $query2 = $result->query($select2);
       

           while($row=$query2->fetch_array()){
               $count1=$row['count'];
           }

        $data=[
            'result'=>$query,
            'fname'=>$fname,
            'count1'=>$count1,


           
        ];
        return $data;
              
    }




    public function add($data){
        $result=$this->connection();
        $p_id=$_SESSION['p_id'];
      
        $id = $_SESSION['id'];
        $sql = "SELECT *FROM $this->table where p_id='".$p_id."'";
        $query3 = $result->query($sql); 

        while($row=$query3->fetch_array()){
            $p_id = $row['p_id'];
            $name = $row['name'];
            $price = $row['price'];
            $image = $row['image'];
            $quantity = $row['quantity'];
        }
        $data = [
            'p_id'=>$p_id,
            'name'=>$name,
            'price'=>$price,
            'image'=>$image,
            'quantity'=>$quantity,
        ];

        

      
        return $data;


       
    }
    public function update($data){
        $result=$this->connection();
        $quantity = $data['quantity'];
        $id = $_SESSION['id'];
        $sql="update $this->table1 set quantity ='".$quantity."' where user_id = '".$id."'";
        $query=$result->query($sql);

        return true;

    }
           
}
          
    






