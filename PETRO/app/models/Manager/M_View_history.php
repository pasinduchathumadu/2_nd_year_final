<?php
class M_View_history extends Model
{
    protected $table = 'fuel_stock';
    protected $table3 = 'registered_users';
    protected $table4 = "all_manager";

    public function View_history($data)
    {
        $result = $this->connection();
        $id = $data['id'];
        $sql1 = "select *from $this->table  ORDER BY `date_field` DESC LIMIT 0,25";
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


        if ($query->num_rows > 0) {

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

    public function get_Date($data)
    {
        $result = $this->connection();
        $startDate = $data['startDate'];
        $finishDate = $data['finishDate'];

        echo $startDate;
    }
}
