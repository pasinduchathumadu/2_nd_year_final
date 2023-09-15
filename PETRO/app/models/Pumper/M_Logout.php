<?php

class M_Logout extends Model{
    protected $table='pumper';
    protected $table2 = 'working_time';

    protected $table3 = 'ot';

    protected $table4 = "salary_precentage";

    protected $table5 = "total_salary";

   
    public function logout(){
        $result=$this->connection();
        $login = $_SESSION['login_time'];
        $pumper_id = $_SESSION['id'];
    

        date_default_timezone_set('Asia/Kolkata');
       
        $time = date('H:i:s');
        $date = date('y-m-d');

        $date1 = new DateTime();
        $year = $date1->format('Y');
       //get the month as string 
        $month1 = $date1->format('m');
        //convert into integer value
        $month1= intval($month1);

        //get the month as string 
        $month = date('F', strtotime($date));
        //insert data into the working time table
        

        $sql = "select *from $this->table where id = '".$pumper_id."' and status = 'not assigned'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $sql="INSERT INTO $this->table2 (Pumper_id,Login_Time,Logout_TIME,Date)values('$pumper_id','$login','$time','$date')";
            $query=$result->query($sql);
        //get time difference from seconds
            $sql="select TIMESTAMPDIFF(SECOND,Login_Time,Logout_TIME) as difference from $this->table2 where Pumper_id = '".$pumper_id."' AND Login_Time ='".$login."'";
            $query=$result->query($sql);
            //assign the time difference to the varriable 
            while($row = $query->fetch_array()){
                $difference=$row['difference'];
                
                if($difference<0){
                    $difference=-$difference;
                }
            }
            //store time difference as new column in table
            $sql="update $this->table2 set working_hours ='".$difference."' where Pumper_id = '".$pumper_id."' AND Login_Time ='".$login."'";
            $query=$result->query($sql);

            $sql1="select *from $this->table2 where Pumper_id='".$pumper_id."' AND Date ='".$date."'";
            $query = $result->query($sql1);
            //get the summation of working hours column
            $total = 0;

            while($row = $query->fetch_array()){
                $total += $row['working_hours'];
            }
    //total seconds convert into hours
            $hours =(int)(($total)/3600);
            if($hours>5){

                $sql1="select *from $this->table3 where (Pumper_id='".$pumper_id."' AND year ='".$year."') AND month='".$month."'";
                $query = $result->query($sql1);
    //get the ot hours
                $f_hours=$hours-5;

                if ($query->num_rows > 0) {
                //update exisiting column newly update value
                    $sql="update $this->table3 set hours ='".$f_hours."' where (Pumper_id = '".$pumper_id."' AND month ='".$month."') AND (year = '".$year."')";
                    $query=$result->query($sql);
                }
                else{
        //added new records
                    $sql="INSERT INTO $this->table3 (Pumper_id,month,hours,year) values('$pumper_id','$month','$f_hours','$year')";
                    $query = $result->query($sql);

                }
                
            }

            $sql1 = "select *from $this->table3 where (Pumper_id = '" . $pumper_id . "' AND month='" . $month. "') AND (year = '" . $year . "')";
            $query1 = $result->query($sql1);
    //get the ot hours per day from ot table
            if ($query1->num_rows > 0) {
                while ($row = $query1->fetch_array()) {
                    $total = $row['hours'];
                }
            }
            else{
                $total=0;
            }
    //get the precentages of the salary generating latest record
            $sql="select *from $this->table4 order by id DESC LIMIT 1";
            $query=$result->query($sql);
            if($query->num_rows>0){
                while($row = $query->fetch_array()){
                    
                    $HRA = $row['HRA'];
                    $DA = $row['Daily_allowances'];
                    $PF = $row['provident_fund'];
                    $OT = $row['OT'];
                    $basic_salary = $row['Basic_salary'];
                }

                //get the count of working days of given month

                    $sql="select COUNT(DISTINCT Date) AS days from $this->table2 where(Pumper_id = '" . $pumper_id . "' AND Month(date)='" . $month1 . "') AND (YEAR(date) = '" . $year . "') ";
                    $query=$result->query($sql);

                    if($query->num_rows>0){

                        while($row=$query->fetch_array())
                        {
                            $count=$row['days'];
                        
                        }
                    }
                    //calculate the basic according to the count of working days
                    $orginal_basic = $count*(float)($basic_salary/25);


                    $HRA_SALARY=$orginal_basic*(float)($HRA/100);
                    $DA_SALARY=$orginal_basic*(float)($DA/100);
                    $OT_SALARY = $OT * $total;
                    $GS=$HRA_SALARY+$DA_SALARY+$orginal_basic+$OT_SALARY;
                    $PF_SALARY=$GS*(float)($PF/100);
                
                    $total = $GS-$PF_SALARY;
    //if there are exisit record update that column
                    $sql="select *from $this->table5 where Pumper_id='".$pumper_id."'AND month = '".$month."'";
                    $query=$result->query($sql);

                    if($query->num_rows>0){
                        $sql="update $this->table5 set salary='".$total."' ,HRA = '".$HRA_SALARY."',DA = '".$DA_SALARY."', GS = '".$GS."',PF='".$PF_SALARY."',OT='".$OT_SALARY."',basic='".$orginal_basic."'
                        WHERE Pumper_id = '".$pumper_id."' AND month = '".$month."'";
                        $query=$result->query($sql);
                    
                    }
                    else{
    //add new records
                        $sql="INSERT INTO $this->table5 (Pumper_id,month,year,salary,basic,HRA,DA,GS,PF,OT)VALUES ('$pumper_id','$month','$year','$total','$orginal_basic','$HRA_SALARY','$DA_SALARY','$GS','$PF_SALARY','$OT_SALARY')";
                        $query=$result->query($sql);
                    }
                
            }
            session_destroy();
            return true;
        }
        else{

            return false;

        }
    }
}