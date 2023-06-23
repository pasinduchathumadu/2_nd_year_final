<?php
class M_Max extends Model
{
    protected $table = 'max';

    public function Max($data)
    {
        // $id = $_SESSION['id'];
        $result = $this->connection();
        $sql = "select *from $this->table";
        $query = $result->query($sql);

        if ($query->num_rows > 0) {
            $data = [
                'result' => $query,
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
        $vehicle = $data['vehicle'];
        $max = $data['max'];

        $sql = "update $this->table SET max = $max where vehicle = '$vehicle'";
        $query = $result->query($sql);

        if ($query) {
            return true;
        } else {
            echo "vvv";
        }
    }
}
