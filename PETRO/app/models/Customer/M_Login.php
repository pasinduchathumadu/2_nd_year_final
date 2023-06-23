<?php 
class M_Login extends Model
{
    protected $table = 'user_form';

    public function login($data){
        $password=$data['pass'];
        $email=$data['email'];

        $result1=$this->connection();
        $sql="select *from $this->table where email='".$email."'";
        $query=$result1->query($sql);
        if($query ->num_rows>0){
            while($row = $query-> fetch_array()){
              $hash = $row['password'];
              $id=$row['id'];
              $_SESSION['id']=$id;
            }
            $decrypt_password = password_verify($password,$hash);
            if($decrypt_password){
              return true;
            }
            else{
              return false;
            }
          }
          else{
            return false;
          }
    }
}





