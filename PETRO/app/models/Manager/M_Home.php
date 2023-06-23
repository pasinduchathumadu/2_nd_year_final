<?php
class M_Home extends Model
{
    protected $table = 'fuel_availability';
    protected $table1 = "registered_users";

    protected $table4 = 'all_manager';
    protected $table2  = 'products';
    protected $table3 = 'complete_order';
    public function view($data)
    {
        $result = $this->connection();
        $id = $data['id'];
        // get profile details
        $sql = "select * from $this->table4 where manager_id = '" . $id . "'";
        $query = $result->query($sql);
        while ($row = $query->fetch_array()) {
            $email = $row['email'];
        }

        $sql = "select *from $this->table1 where email ='" . $email . "' AND role = 'manager'";
        $query = $result->query($sql);
        // get fuel details
        $sql1 = "select * from $this->table where fuel_id= 'O92'";
        $query1 = $result->query($sql1);
        $sql2 = "select * from $this->table where fuel_id= 'O95'";
        $query2 = $result->query($sql2);
        $sql3 = "select * from $this->table where fuel_id= 'SDL'";
        $query3 = $result->query($sql3);
        $sql4 = "select * from $this->table where fuel_id= 'ADL'";
        $query4 = $result->query($sql4);
        // Out of stock product details
        $sql5 = "select * from $this->table2 where quantity < 10";
        $query5 = $result->query($sql5);

        // View today sellings of fuel
        $sql_1 = "SELECT  *FROM $this->table3 where fuel_type = 'auto diesel' AND DATE(time) = CURDATE()";
        $query_1 = $result->query($sql_1);
        $total_adl = 0;
        $incomeadl = 0;
        while ($row = $query_1->fetch_array()) {
            $total_adl += $row['pumped_liters'];
            $incomeadl += $row['pay'];
        }


        $sql_2 = "SELECT  *FROM $this->table3 where fuel_type = 'super diesel' AND DATE(time) = CURDATE()";
        $query_2 = $result->query($sql_2);
        $total_sdl = 0;
        $incomesdl = 0;
        while ($row = $query_2->fetch_array()) {
            $total_sdl += $row['pumped_liters'];
            $incomesdl += $row['pay'];
        }


        $sql_3 = "SELECT *FROM $this->table3 where fuel_type = 'octane 92' AND DATE(time) = CURDATE()";
        $query_3 = $result->query($sql_3);
        $total_O92 = 0;
        $income_O92 = 0;
        while ($row = $query_3->fetch_array()) {
            $total_O92 += $row['pumped_liters'];
            $income_O92 += $row['pay'];
        }


        $sql_4 = "SELECT *FROM $this->table3 where fuel_type = 'octane 95' AND DATE(time) = CURDATE()";
        $query_4 = $result->query($sql_4);
        $total_O95 = 0;
        $income_O95 = 0;
        while ($row = $query_4->fetch_array()) {
            $total_O95 += $row['pumped_liters'];
            $income_O95 += $row['pay'];
        }
        //

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_array()) {

                $First_name = $row['fname'];
                $Last_name = $row['lname'];
                $NIC = $row['NIC'];
            }
        }
        if ($query1->num_rows > 0) {
            while ($row = $query1->fetch_array()) {
                $fuel_id = $row['fuel_id'];
                $fuel_type = $row['fuel_type'];
                $eligible_amount = $row['eligible_amount'];
                $remain_amount = $row['remain_amount'];
                $price = $row['price'];
                $empty = $row['empty_space'];
                $tank = $row['tank_size'];
            }
            $percentage = (int)($empty / $tank * 100);
        }
        if ($query2->num_rows > 0) {
            while ($row = $query2->fetch_array()) {
                $fuel_id2 = $row['fuel_id'];
                $fuel_type2 = $row['fuel_type'];
                $eligible_amount2 = $row['eligible_amount'];
                $remain_amount2 = $row['remain_amount'];
                $price2 = $row['price'];
                $empty2 = $row['empty_space'];
                $tank2 = $row['tank_size'];
            }
            $percentage2 = (int)($empty2 / $tank2 * 100);
        }

        if ($query3->num_rows > 0) {
            while ($row = $query3->fetch_array()) {
                $fuel_id3 = $row['fuel_id'];
                $fuel_type3 = $row['fuel_type'];
                $eligible_amount3 = $row['eligible_amount'];
                $remain_amount3 = $row['remain_amount'];
                $price3 = $row['price'];
                $empty3 = $row['empty_space'];
                $tank3 = $row['tank_size'];
            }
            $percentage3 = (int)($empty3 / $tank3 * 100);
        }
        if ($query4->num_rows > 0) {
            while ($row = $query4->fetch_array()) {
                $fuel_id4 = $row['fuel_id'];
                $fuel_type4 = $row['fuel_type'];
                $eligible_amount4 = $row['eligible_amount'];
                $remain_amount4 = $row['remain_amount'];
                $price4 = $row['price'];
                $empty4 = $row['empty_space'];
                $tank4 = $row['tank_size'];
            }
            $percentage4 = (int)($empty4 / $tank4 * 100);
        }
        //pass the values to array
        $arr = array(
            'id' => $id,
            'First_name' => $First_name,
            'Last_name' => $Last_name,
            'NIC' => $NIC,
            'email' => $email,
            'fuel_id' => $fuel_id,
            'fuel_type' => $fuel_type,
            'eligible_amount' => $eligible_amount,
            'remain_amount' => $remain_amount,
            'price' => $price,
            'percentage' => $percentage,
            'fuel_id2' => $fuel_id2,
            'fuel_type2' => $fuel_type2,
            'eligible_amount2' => $eligible_amount2,
            'remain_amount2' => $remain_amount2,
            'price2'  => $price2,
            'percentage2' => $percentage2,
            'fuel_id3' => $fuel_id3,
            'fuel_type3' => $fuel_type3,
            'eligible_amount3' => $eligible_amount3,
            'remain_amount3' => $remain_amount3,
            'price3' => $price3,
            'percentage3' => $percentage3,
            'fuel_id4' => $fuel_id4,
            'fuel_type4' => $fuel_type4,
            'eligible_amount4' => $eligible_amount4,
            'remain_amount4' => $remain_amount4,
            'price4' => $price4,
            'percentage4' => $percentage4,
            'products' => $query5,
            'O92' => $total_O92,
            'O95' => $total_O95,
            'ADL' => $total_adl,
            'SDL' => $total_sdl,
            'income92' => $income_O92,
            'income95' => $income_O95,
            'incomeadl' => $incomeadl,
            'incomesdl' => $incomesdl,
            'loading' => '1',
            'err' => '',
        );
        return $arr;
    }
}
