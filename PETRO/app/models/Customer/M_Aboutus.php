<?php 
    class M_Aboutus extends Model{
  

        public function aboutus($data){
            $result=$this->connection();
            $id = $_SESSION['CUS_id'];
            $fname=$_SESSION['CUS_first_name'];
     
            $arr=array(
                'fname' => $fname,
                
          
              
            );
            return $arr;
        }
    }
?>