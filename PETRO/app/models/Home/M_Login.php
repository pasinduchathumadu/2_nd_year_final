<?php

class M_Login extends Model{
    protected $table = 'total_user';
    protected $table1 = 'pumper';

    protected $table2 = 'user_form';

    protected $table3 = 'distribution_manager';

  protected $table4 = 'customer_manager';

    public function login($data){
        $result=$this->connection();
        $Email=$data['Email'];
        $Password = $data['password'];
        $sql="select *from $this->table where email='".$Email."' AND status=1";
        $query=$result->query($sql);
        if($query->num_rows>0){
          while($row = $query-> fetch_array()){
            $hash = $row['password'];
            $role = $row['role'];
          }
          $decrypt_password = password_verify($Password,$hash);
          if($decrypt_password){
            if($role=='pumper'){
                    $sql = "select *from $this->table1 where email='" . $Email . "'";
                    $query1 = $result->query($sql);
                    while ($row = $query1->fetch_array()) {
                        $pumper_id = $row['id'];
                    }
                    $_SESSION['id'] = $pumper_id;

                    return 1;

            }
            elseif($role=='customer'){
                $sql = "select *from $this->table2 where email='" . $Email . "'";
                    $query1 = $result->query($sql);
                    while ($row = $query1->fetch_array()) {
                        $id = $row['id'];
                    }
                    $_SESSION['id'] = $id;

                    return 2;

            }
            elseif($role=='manager'){
                $sql = "select *from $this->table3 where email='" . $Email . "'";
                    $query1 = $result->query($sql);
                    while ($row = $query1->fetch_array()) {
                        $id = $row['distribution_manager_id'];
                    }
                    $_SESSION['distribution_manager_id'] = $id;

                    return 3;

            }
            elseif($role=='staff'){
              $sql = "select *from $this->table4 where email='" . $Email . "'";
                  $query1 = $result->query($sql);
                  while ($row = $query1->fetch_array()) {
                      $id = $row['customer_manager_id'];
                      $name = $row["First_name"];
                  }
                  $_SESSION['manager_ID'] = $id;
                  $_SESSION['manager_name'] = $name;
                

                  return 4;

          }
           
            
          }
          else{
            return 5;
          }
        }
        else{
          return 5;
        }
    }



}