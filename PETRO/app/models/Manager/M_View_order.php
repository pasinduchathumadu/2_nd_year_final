<?php
    class M_View_order extends Model{
        protected $table = 'complete_order';

        public function View_order($data){
           // $id = $_SESSION['id'];
            $result = $this->connection();
            $sql="select *from $this->table";
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
}
?>