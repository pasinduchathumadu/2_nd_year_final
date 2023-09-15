<?php

class M_Login extends Model{
    protected $table = 'registered_users';
    protected $table1 = 'pumper';

    protected $table2 = 'user_form';

    protected $table3 = 'all_manager';

  

    public function login($data){
        $result=$this->connection();
        $Email=$data['Email'];
        $Password = $data['password'];
        $sql="select *from $this->table where email='".$Email."' AND status=1";
        $query=$result->query($sql);
        if($query->num_rows>0){
          while($row = $query-> fetch_array()){
            $hash = $row['password'];
            $first = $row['fname'];
            $last = $row['lname'];
            $role = $row['role'];
          }
          $decrypt_password = password_verify($Password,$hash);
          if($decrypt_password){
            if($role=='pumper'){
                    $sql = "select *from $this->table1 where email='" . $Email . "' AND status ='not assigned'";
                    $query1 = $result->query($sql);
                    
                    if($query1->num_rows>0){
                      return 8;

                    }
                    else{
                      $sql = "select *from $this->table1 where email='" . $Email . "' AND status ='assigned'";
                      $query1 = $result->query($sql);
                    
                      while ($row = $query1->fetch_array()) {
                        $pumper_id = $row['id'];
                       
                      }
                    $_SESSION['id'] = $pumper_id;
                    $_SESSION['first_name'] = $first;



                    return 1;

                    }

                   

            }
            elseif($role=='customer'){
                $sql = "select *from $this->table2 where email='" . $Email . "'";
                    $query1 = $result->query($sql);
                    while ($row = $query1->fetch_array()) {
                        $id = $row['id'];
                    }
                    $_SESSION['CUS_id'] = $id;
                    $_SESSION['CUS_first_name'] = $first;

                    return 2;

            }
            elseif($role=='manager'){
                $sql = "select *from $this->table3 where email='" . $Email . "' AND type='manager'";
                    $query1 = $result->query($sql);
                    while ($row = $query1->fetch_array()) {
                        $id = $row['manager_id'];
                    }
                    $_SESSION['distribution_manager_id'] = $id;
                    $_SESSION['fuel_first_name'] = $first;
                    $_SESSION['fuel_last_name'] = $last;


                    return 3;

            }
            elseif($role=='staff'){
              $sql = "select *from $this->table3 where email='" . $Email . "' AND type = 'staff'";
                  $query1 = $result->query($sql);
                  while ($row = $query1->fetch_array()) {
                      $id = $row['manager_id'];
                    

                      
                  }
                  $_SESSION['manager_ID'] = $id;
                  $_SESSION['manager_name'] = $first;
                  $_SESSION['manager_name_Last'] = $last;

                

                  return 4;

          }
          elseif($role=='Admin'){
            $sql = "select *from $this->table where email='" . $Email . "'";
            $query1 = $result->query($sql);
            while ($row = $query1->fetch_array()) {
                $id = $row['email'];
             
            }
            $_SESSION['email'] = $id;
         
          
            return 6;

          }
           
            
          }
   
        }
        else{
          return 5;
        }
    }



}