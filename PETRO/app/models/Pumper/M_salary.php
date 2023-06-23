<?php 
class M_salary extends Model{
    protected $table = "salary_precentage";

    protected $table1 = "pumper";

    protected $table2 = "working_time";

    protected $table3 = "ot";

    public $pdf;
    public function __construct(){
        $this->pdf=$this->pdf('Download');
    }

    

    public function loading($data){
        $result=$this->connection();
        $pumper_id = $_SESSION['id'];
        $download = $data['download'];


        date_default_timezone_set('Asia/Kolkata');
        $date = date('y-m-d');
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));

        $count=0;

        $sql="select *from $this->table1 where id = '".$pumper_id."'";
        $query = $result->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_array()) {
                $first= $row['first_name'];
                $last = $row['last_name'];
                $id = $row['id'];
                $email = $row['email'];

            }
        }
        

        $sql1 = "select *from $this->table3 where (Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "')";
        $query1 = $result->query($sql1);

        $total = 0;
        if ($query1->num_rows > 0) {
            while ($row = $query1->fetch_array()) {
                $total += $row['hours'];
            }
        }
        

        $sql="select *from $this->table where (month='".$month."' AND year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $basic=$row['Basic'];
                $HRA = $row['HRA'];
                $DA = $row['Daily_allowances'];
                $PF = $row['provident_fund'];
                $OT = $row['OT'];
                $basic_salary = $row['Basic_salary'];

                $sql="select COUNT(DISTINCT Date) AS days from $this->table2 where(Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "') ";
                $query=$result->query($sql);

                if($query->num_rows>0){

                    while($row=$query->fetch_array())
                    {
                        $count=$row['days'];
                    
                    }
                }

                $orginal_basic = $count*(float)($basic_salary/25);


                $HRA_SALARY=$orginal_basic*(float)($basic/100);
                $DA_SALARY=$orginal_basic*(float)($DA/100);
                $GS=$HRA_SALARY+$DA_SALARY+$orginal_basic;
                $PF_SALARY=$GS*(float)($PF/100);
                $OT_SALARY = $OT * $total;
                $total = $GS+ $OT_SALARY-$PF_SALARY;


            }
        }
        $data=[
            'first'=>$first,
            'last'=>$last,
            'id'=>$id,
            'basic'=>$basic,
            'HRA'=>$HRA,
            'DA'=>$DA,
            'PF'=>$PF,
            'OT'=>$OT,
            'HRA_s'=>$HRA_SALARY,
            'DA_s'=>$DA_SALARY,
            'PF_s'=>$PF_SALARY,
            'GS'=>$GS,
            'basic_s'=>$orginal_basic,
            'OT_SALARY'=>$OT_SALARY,
            'total'=>$total,
            'month'=>$month,
            'email'=>$email,
            'year'=>$year,

        ];
        if($download==1){
            $check=$this->pdf->first($data);
        }
          return $data;
            

        

        
    }
    public function previous($data){
        
        $result=$this->connection();
        $pumper_id = $_SESSION['id'];
        $date_1 = $data['date'];

        date_default_timezone_set('Asia/Kolkata');
        $date = $date_1;
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));

        $count=0;

        $sql1 = "select *from $this->table3 where (Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "')";
        $query1 = $result->query($sql1);

        $total = 0;
        if ($query1->num_rows > 0) {
            while ($row = $query1->fetch_array()) {
                $total += $row['hours'];
            }
        }
      

        $sql="select *from $this->table where (month = '".$month."' AND year = '".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $basic=$row['Basic'];
                $HRA = $row['HRA'];
                $DA = $row['Daily_allowances'];
                $PF = $row['provident_fund'];
                $OT = $row['OT'];
                $basic_salary = $row['Basic_salary'];

                $sql="select COUNT(DISTINCT Date) AS days from $this->table2 where(Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "') ";
                $query=$result->query($sql);

                if($query->num_rows>0){

                    while($row=$query->fetch_array())
                    {
                        $count=$row['days'];
                    
                    }
                }

                $orginal_basic = $count*(float)($basic_salary/25);

                $HRA_SALARY=$orginal_basic*(float)($basic/100);
                $DA_SALARY=$orginal_basic*(float)($DA/100);
                $GS=$HRA_SALARY+$DA_SALARY+$orginal_basic;
                $PF_SALARY=$GS*(float)($PF/100);
                $OT_SALARY = $OT * $total;
                $total = $GS- $PF_SALARY + $OT_SALARY;


            }
            $data=[
                'basic'=>$basic,
                'HRA'=>$HRA,
                'DA'=>$DA,
                'PF'=>$PF,
                'OT'=>$OT,
                'HRA_s'=>$HRA_SALARY,
                'DA_s'=>$DA_SALARY,
                'PF_s'=>$PF_SALARY,
                'GS'=>$GS,
                'basic_s'=>$orginal_basic,
                'OT_SALARY'=>$OT_SALARY,
                'total'=>$total,
    
            ];
    
            return $data;
        }
        else{
            return false;
        }
       
    }
    
}