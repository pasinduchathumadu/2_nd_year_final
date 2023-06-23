<?php
class M_Change_Price extends Model
{
    protected $table1 = "fuel_availability";
    protected $table2 = "price_history";
    protected $table3 = 'registered_users';
    protected $table4 = "all_manager";

    public function change_price($data)
    {
        $result = $this->connection();
        $price = $data['price'];
        $fuel_type = $data['fuel_type'];

        $sql1 = "update $this->table1 SET price = $price WHERE fuel_type = '$fuel_type'";
        $query1 = $result->query($sql1);

        $sql5 = "insert into $this->table2 (fuel_type,price) values ('$fuel_type','$price')";
        $query5 = $result->query($sql5);



        if ($query1 && $query5) {
            return true;
        } else {
            echo "vvvvvvvvv";
        }
    }

    public function price_history($data)
    {
        //$id = $_SESSION['id'];
        $result = $this->connection();
        $id = $data['id'];
        $sql1 = "select *from $this->table2 ORDER BY 'date' DESC";
        $query1 = $result->query($sql1);

        //Profile Details
        $sql = "select * from $this->table4 where manager_id = '" . $id . "'";
        $query = $result->query($sql);
        while ($row = $query->fetch_array()) {
            $email = $row['email'];
        }

        $sql = "select *from $this->table3 where email ='" . $email . "' AND role = 'manager'";
        $query = $result->query($sql);
        //
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_array()) {

                $First_name = $row['fname'];
                $Last_name = $row['lname'];
                $NIC = $row['NIC'];
            }
        }

        if ($query1->num_rows > 0) {
            $data = [
                'result' => $query1,
                'First_name' => $First_name,
                'Last_name' => $Last_name,
                'NIC' => $NIC,
                'error' => '',
            ];
            return $data;
        } else {
            return false;
        }
    }
}
