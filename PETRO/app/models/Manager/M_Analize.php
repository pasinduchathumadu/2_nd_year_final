<?php
class M_Analize extends Model
{
    protected $table = 'fuel_stock';
    protected $table3 = 'registered_users';
    protected $table4 = "all_manager";


    public function Analize($data)
    {
        $result = $this->connection();
       

        $startDate = $data['startDate'];
        $finishDate = $data['finishDate'];

        $newstartDate = date("Ymd", strtotime($startDate));
        $newfinishDate = date("Ymd", strtotime($finishDate));
        $total_adl = 0;
        $sql1 = "SELECT  *FROM $this->table where fuel_type = 'auto diesel' AND date_field BETWEEN $newstartDate AND $newfinishDate";
        $query1 = $result->query($sql1);
      
        while ($row = $query1->fetch_array()) {
            $total_adl += $row['arrive_amount'];
        }
        $total_sdl = 0;

        $sql2 = "SELECT  *FROM $this->table where fuel_type = 'super diesel' AND date_field BETWEEN $newstartDate AND $newfinishDate";
        $query2 = $result->query($sql2);
        
        while ($row = $query2->fetch_array()) {
            $total_sdl += $row['arrive_amount'];
        }

        $total_O92 = 0;
        $sql3 = "SELECT *FROM $this->table where fuel_type = 'octane 92' AND date_field BETWEEN $newstartDate AND $newfinishDate";
        $query3 = $result->query($sql3);
       
        while ($row = $query3->fetch_array()) {
            $total_O92 += $row['arrive_amount'];
        }

        $total_O95 = 0;
        $sql4 = "SELECT *FROM $this->table where fuel_type = 'octane 95' AND date_field BETWEEN $newstartDate AND $newfinishDate";
        $query4 = $result->query($sql4);
        
        while ($row = $query4->fetch_array()) {
            $total_O95 += $row['arrive_amount'];
        }

        $data = [
            'O92' => $total_O92,
            'O95' => $total_O95,
            'SDL' => $total_sdl,
            'ADL' => $total_adl,

        ];



        return $data;
    }
}
