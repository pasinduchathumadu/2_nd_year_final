<?php

class M_salary_rate extends Model{

    protected $table = 'salary_precentage';



    
    public function currentRate(){
        $result = $this->connection();
        
        $sql="select * from salary_precentage ORDER BY id DESC LIMIT 1";
        $query = $result->query($sql);
        $data = $query->fetch_array();
        return $data;
    }
    
    public function submit_record($data){
        $result = $this->connection();
        $insert = "Insert into salary_precentage set Basic_salary = '".$data['Basic_salary']."', HRA = '".$data['HRA']."', Daily_allowances = '".$data['Daily_allowances']."', provident_fund = '".$data['provident_fund']."', OT ='".$data['OT']."' ";
        $query = $result->query($insert);
        if($query){
            return 1;
        }
        else{
            return 0;
        }
    }
    
}