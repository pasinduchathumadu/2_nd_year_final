<?php

class M_Mainorder extends Model
{
    protected $table = 'finalorder';
    protected $table2 = 'product_order';
    protected $table3 = 'user_form';
    protected $table4 = 'products';
    public function mainorder($data)
    {

        $result = $this->connection();
        $sql = "select *from $this->table where status=0";
        $query = $result->query($sql);

        $sql2 = "select *from $this->table2 where status=0 ";
        $query2 = $result->query($sql2);

        if ($query->num_rows > 0) {
            $data = [
                'result1' => $query,
                'result2' => $query2,
                'error' => '',
            ];
            return $data;
        } else {
            return false;
        }
    }



    public function add($data)
    {
        $result = $this->connection();
        $id = $data['oid'];
        $user_id = $data['user_id'];
        $pids = $data['pids'];



        $string = $data['pids'];
        $str_arr = preg_split("/\,/", $string);
        print_r($str_arr);





        $sql = "UPDATE $this->table SET status=1 WHERE Oid='" . $id . "'";
        $query = $result->query($sql);

        $i = 0;

        while ($i < count($str_arr)) {
            $sql2 = "UPDATE $this->table2 SET status=1 WHERE Oid='" . $str_arr[$i] . "'";
            $query2 = $result->query($sql2);

            $sql3 = "SELECT COUNT(quantity) AS quantity from $this->table2  WHERE Oid='" . $str_arr[$i] . "'";
            $query3 = $result->query($sql3);
            
        
            $row=$query3->fetch_array();
            $count= $row['quantity'];
            
            $sql4 = "UPDATE  $this->table3 SET points=points+".$count."*2 WHERE id='".$user_id. "'";
            $query4 = $result->query($sql4);



            $i++;
        }
    }
}
