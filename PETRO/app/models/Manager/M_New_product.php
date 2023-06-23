<?php
    class M_New_product extends Model{
        protected $table = 'products';

        public function Product($data){
           // $id = $_SESSION['id'];
            $result = $this->connection();
            $sql="select *from $this->table ";
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