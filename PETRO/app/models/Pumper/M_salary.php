<?php 
class M_salary extends Model{
   

    protected $table= "total_salary";

    protected $table1 = "pumper";

    protected $table2 = 'registered_users';

    public $pdf;
    public function __construct(){
        $this->pdf=$this->pdf('Download');
    }

    

    public function loading($data){
        $result=$this->connection();
        $pumper_id = $_SESSION['id'];
        //check the pumper want to download
        $download = $data['download'];

        $sql="select *from $this->table1 where id='".$pumper_id."'";
        $query=$result->query($sql);
//pumper email
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $email=$row['email'];
            }
        }
//pumper details
        $sql = "select *from $this->table2 where email = '".$email."'";
        $query = $result->query($sql);

        if($query->num_rows>0){
            while($row = $query->fetch_array()){
                $first = $row['fname'];
                $last = $row['lname'];
            }
        }
       
//get the month of pumper needs to download
        if($download==1){
            $year = $data['year'];
            $month = $data['month'];

        }
//normal process
        else{
        date_default_timezone_set('Asia/Kolkata');
        $date = date('y-m-d');
        $year = date('Y', strtotime($date));

        $month = date('F', strtotime('-1 month')); 
        }
       
        //$month = date('m', strtotime('last month'));
        
//set the total salary to respective months
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='January')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $jan=$row['salary'];
            }
        }
        else{
            $jan=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='February')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $feb=$row['salary'];
            }
        }
        else{
            $feb=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='March')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $march=$row['salary'];
            }
        }
        else{
            $march=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='April')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $april=$row['salary'];
            }
        }
        else{
            $april=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='May')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $may=$row['salary'];
            }
        }
        else{
            $may=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='June')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $jun=$row['salary'];
            }
        }
        else{
            $jun=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='July')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $july=$row['salary'];
            }
        }
        else{
            $july=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='August')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $Aug=$row['salary'];
            }
        }
        else{
            $Aug=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='September')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $sep=$row['salary'];
            }
        }
        else{
            $sep=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='October')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $oct=$row['salary'];
            }
        }
        else{
            $oct=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='November')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $nov=$row['salary'];
            }
        }
        else{
            $nov=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='December')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $dec=$row['salary'];
            }
        }
        else{
            $dec=null;
        }
   
       

       
        
//get the paysheet details to required month only
        $sql1 = "select *from $this->table where (Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "')";
        $query1 = $result->query($sql1);

        if($query1->num_rows>0){
            while($row = $query1->fetch_array()){
                $salary = $row['salary'];
                $basic = $row['basic'];
                $HRA = $row['HRA'];
                $DA = $row['DA'];
                $GS = $row['GS'];
                $PF = $row['PF'];
                $OT = $row['OT'];
            }
        $data=[
          
            'basic_s'=>$basic,
            'month'=>$month,
            'year'=>$year,

            'first'=>$first,
            'email'=>$email,
            'last'=>$last,

            'id'=>$pumper_id,
         
            'DA_s'=>$DA,
            'PF_s'=>$PF,
           
            'HRA_s'=>$HRA,
           
            'GS_s'=>$GS,
          
            'OT_SALARY'=>$OT,

            'total'=>$salary,
            'jan'=>$jan,
            'feb'=>$feb,
            'march'=>$march,
            'april'=>$april,
            'may'=>$may,
            'jun'=>$jun,
            'july'=>$july,
            'sep'=>$sep,
            'Aug'=>$Aug,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,

            'err'=>0
            

        ];
    //pass these data to the dompdf function
        if($download==1){
            $check=$this->pdf->first($data);
        }
          return $data;
    }
//there is no result of the query 
    else{
        $data=[
            'month'=>$month,
            'year'=>$year,

            'id'=>$pumper_id,
            'jan'=>$jan,
            'feb'=>$feb,
            'march'=>$march,
            'april'=>$april,
            'may'=>$may,
            'jun'=>$jun,
            'july'=>$july,
            'sep'=>$sep,
            'Aug'=>$Aug,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,

            'err'=>1,
        ];
        return $data;
    }
            

        

        
    }
    public function previous($data){
        
        $result=$this->connection();
        $pumper_id = $_SESSION['id'];
        //get the request month
        $date_1 = $data['date'];

        date_default_timezone_set('Asia/Kolkata');
        $date = $date_1;
        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));

        //set total salary for every month

        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='January')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $jan=$row['salary'];
            }
        }
        else{
            $jan=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='February')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $feb=$row['salary'];
            }
        }
        else{
            $feb=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='March')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $march=$row['salary'];
            }
        }
        else{
            $march=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='April')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $april=$row['salary'];
            }
        }
        else{
            $april=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='May')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $may=$row['salary'];
            }
        }
        else{
            $may=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='June')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $jun=$row['salary'];
            }
        }
        else{
            $jun=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='July')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $july=$row['salary'];
            }
        }
        else{
            $july=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='August')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $Aug=$row['salary'];
            }
        }
        else{
            $Aug=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='September')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $sep=$row['salary'];
            }
        }
        else{
            $sep=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='October')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $oct=$row['salary'];
            }
        }
        else{
            $oct=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='November')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $nov=$row['salary'];
            }
        }
        else{
            $nov=null;
        }
        $sql="SELECT *from $this->table where (Pumper_id = '".$pumper_id."' AND month='December')AND (year='".$year."')";
        $query=$result->query($sql);
        if($query->num_rows>0){
            while($row=$query->fetch_array()){
                $dec=$row['salary'];
            }
        }
        else{
            $dec=null;
        }
//get the pay-sheet required month only 
        $sql1 = "select *from $this->table where (Pumper_id = '" . $pumper_id . "' AND month='" . $month . "') AND (year = '" . $year . "')";
        $query1 = $result->query($sql1);

        if($query1->num_rows>0){
            while($row = $query1->fetch_array()){
                $salary = $row['salary'];
                $basic = $row['basic'];
                $HRA = $row['HRA'];
                $DA = $row['DA'];
                $GS = $row['GS'];
                $PF = $row['PF'];
                $OT = $row['OT'];
      


            }
        
       
        
        
        $data=[
          
            'basic_s'=>$basic,
            'month'=>$month,
            'year'=>$year,

            'id'=>$pumper_id,
         
            'DA_s'=>$DA,
            'PF_s'=>$PF,
           
            'HRA_s'=>$HRA,
           
            'GS_s'=>$GS,
          
            'OT_SALARY'=>$OT,

            'total'=>$salary,
            
            'jan'=>$jan,
            'feb'=>$feb,
            'march'=>$march,
            'april'=>$april,
            'may'=>$may,
            'jun'=>$jun,
            'july'=>$july,
            'sep'=>$sep,
            'Aug'=>$Aug,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,

            'err'=>0
            

        ];
        
          return $data;
    }
    //there is no records 
    else{
        $data=[
            'month'=>$month,
            'year'=>$year,

            'id'=>$pumper_id,
            'jan'=>$jan,
            'feb'=>$feb,
            'march'=>$march,
            'april'=>$april,
            'may'=>$may,
            'jun'=>$jun,
            'july'=>$july,
            'sep'=>$sep,
            'Aug'=>$Aug,
            'oct'=>$oct,
            'nov'=>$nov,
            'dec'=>$dec,
            'err'=>1,
        ];
        return $data;
    }

        
       
    }
    
}