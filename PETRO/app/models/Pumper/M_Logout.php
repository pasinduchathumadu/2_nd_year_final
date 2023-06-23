<?php

class M_Logout extends Model{
    protected $table='pumper';
    protected $table2 = 'working_time';

    protected $table3 = 'ot';

   
    public function logout(){
        $result=$this->connection();
        $login = $_SESSION['login_time'];
        $pumper_id = $_SESSION['id'];
    

        date_default_timezone_set('Asia/Kolkata');
       
        $time = date('H:i:s');
        $date = date('y-m-d');

        $year = date('Y', strtotime($date));
        $month = date('F', strtotime($date));
        $sql="INSERT INTO $this->table2 (Pumper_id,Login_Time,Logout_TIME,Date,month,year)values('$pumper_id','$login','$time','$date','$month','$year')";
        $query=$result->query($sql);
       
        $sql="select TIMESTAMPDIFF(SECOND,Login_Time,Logout_TIME) as difference from $this->table2 where Pumper_id = '".$pumper_id."' AND Login_Time ='".$login."'";
        $query=$result->query($sql);
        while($row = $query->fetch_array()){
            $difference=$row['difference'];

            if($difference<0){
                $difference=-$difference;
            }
        }
        $sql="update $this->table2 set working_hours ='".$difference."' where Pumper_id = '".$pumper_id."' AND Login_Time ='".$login."'";
        $query=$result->query($sql);

        $sql1="select *from $this->table2 where Pumper_id='".$pumper_id."' AND Date ='".$date."'";
        $query = $result->query($sql1);

        $total = 0;

        while($row = $query->fetch_array()){
            $total += $row['working_hours'];
        }

        $hours =(int)(($total)/3600);
        if($hours>8){

            $sql1="select *from $this->table3 where (Pumper_id='".$pumper_id."' AND year ='".$year."') AND month='".$month."'";
            $query = $result->query($sql1);

            $f_hours=$hours-8;

            if ($query->num_rows > 0) {
                $sql="update $this->table3 set hours ='".$f_hours."' where (Pumper_id = '".$pumper_id."' AND month ='".$month."') AND (year = '".$year."')";
                $query=$result->query($sql);
            }
            else{
                $sql="INSERT INTO $this->table3 (Pumper_id,month,hours,year) values('$pumper_id','$month','$f_hours','$year')";
                $query = $result->query($sql);

            }
            
        }
        session_destroy();
        return true;



       


    }
}