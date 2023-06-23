<?php
class M_Add_report extends Model
{
    protected $table1 = "daily_report";
    protected $table2 = "complete_order";
    protected $table3 = "distribution_manager";

    public function Add_report($data)
    {
        $result = $this->connection();

        $date =  $data['date'];
        $reduced92 = $data['reduced92'];
        $reduced95 = $data['reduced95'];
        $reducedsdl = $data['reducedsdl'];
        $reducedadl = $data['reducedadl'];
        $newDate = date("Ymd", strtotime($date));

        $sql_1 = "SELECT  *FROM $this->table2 where fuel_type = 'auto diesel' AND DATE(time) = $newDate";
        $query_1 = $result->query($sql_1);
        $total_adl = 0;
        while ($row = $query_1->fetch_array()) {
            $total_adl += $row['pumped_liters'];
        }


        $sql_2 = "SELECT  *FROM $this->table2 where fuel_type = 'super diesel' AND DATE(time) = $newDate";
        $query_2 = $result->query($sql_2);
        $total_sdl = 0;
        while ($row = $query_2->fetch_array()) {
            $total_sdl += $row['pumped_liters'];
        }


        $sql_3 = "SELECT *FROM $this->table2 where fuel_type = 'octane 92' AND DATE(time) = $newDate";
        $query_3 = $result->query($sql_3);
        $total_O92 = 0;
        while ($row = $query_3->fetch_array()) {
            $total_O92 += $row['pumped_liters'];
        }


        $sql_4 = "SELECT *FROM $this->table2 where fuel_type = 'octane 95' AND DATE(time) = $newDate";
        $query_4 = $result->query($sql_4);
        $total_O95 = 0;
        while ($row = $query_4->fetch_array()) {
            $total_O95 += $row['pumped_liters'];
        }

        $diff92 = $reduced92 - $total_O92;
        $diff95 = $reduced95 - $total_O95;
        $diffsdl = $reducedsdl - $total_sdl;
        $diffadl = $reducedadl - $total_adl;

        $sql = "insert into $this->table1 values ('$date','$reduced92','$total_O92','$diff92','$reduced95','$total_O95','$diff95',
                    '$reducedsdl','$total_sdl','$diffsdl','$reducedadl','$total_adl','$diffadl')";

        $query = $result->query($sql);



        if ($query) {

            return true;
        } else {
            echo "vvvvvvvvv";
        }
    }
}
