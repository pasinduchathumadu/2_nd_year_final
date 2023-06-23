<?php
    class M_Report_history extends Model{
        protected $table = 'daily_report';

        public function Report_history($data){
           // $id = $_SESSION['id'];
            $result = $this->connection();
            $sql="select *from $this->table ORDER BY `date` DESC";
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

    public function View_report($data){
        // $id = $_SESSION['id'];
        return $data;
         

 }

    
}
?>