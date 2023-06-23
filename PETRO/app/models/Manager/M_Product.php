<?php
    class M_Product extends Model{
        protected $table = 'products';

        public function Product($data){
           // $id = $_SESSION['id'];
            $result = $this->connection();
            $sql="select *from $this->table ORDER BY RAND() LIMIT 6";
            $query = $result->query($sql);
            
            if($query->num_rows>0){
                    $data=[
                        'result'=>$query,
                        'error'=>'',
                    ];
                    return $data;
            }
            else{
                return false;
            }
    }

        public function Add_product($data){
            $result = $this->connection();
            $id = $data['id'];
            $quantity =$data['quantity'];
            $price = $data['price'];

            $sql1 = "UPDATE $this->table SET price = $price WHERE p_id = '$id'";
            $query1 = $result->query($sql1);
            $sql2 = "UPDATE $this->table SET quantity = quantity + $quantity WHERE p_id = '$id'";
            $query2 = $result->query($sql2);
            //$sql3 = "insert into $this->table (name,price,quantity) values ('$name','$price','$quantity')";
            //$query3 = $result->query($sql3);
            if($query1&&$query2)//)
            {
                return true;
            }
        }

        public function New_product($data){
            $result = $this->connection();
            $name =$data['name'];
            $description = $data['description'];
            $quantity =$data['quantity'];
            $price = $data['price'];


            $sql3 = "insert into $this->table (name,description,price,quantity) values ('$name','$description','$price','$quantity')";
            $query3 = $result->query($sql3);
            if($query3)//)
            {
                return true;
            }
        }


}
?>