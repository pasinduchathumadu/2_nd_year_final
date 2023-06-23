<?php

class M_pumper_registration extends Model{

    protected $table = 'pumper';

    
    public function submit_record($data){
        $result = $this->connection();
        
        $password = $data['password'];
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $password);      //preg_match() returns whether a match was found in a string.
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        //check both password are match
        if($data['password'] != $data['confirmPassword']){
            return 0;
        
        // Validate password strength 
        }elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            return 2;    

        }else{
            $hash = password_hash($data['password'],PASSWORD_DEFAULT);
            //update user record given data to the data base table
            $insertpumper = "INSERT INTO pumper (id, email, status, Shift) VALUES('".$data['id']."','".$data['email']."','not assigned','".$data['shift']."')";

            //inster to total user table
            $insertlogin = "INSERT INTO registered_users (email , password, fname, lname, NIC, phone, role, status) VALUES('".$data['email']."','".$hash."','".$data['first_name']."','".$data['last_name']."','".$data['nic']."','".$data['phone_no']."','pumper',1)";
            
            //parent shoud be insert first then child can enter data so register user shoud be insert first
            $query2 = $result->query($insertlogin);
            $query1 = $result->query($insertpumper);

            //redirect to the staff manager's page
            return 1;
            
        };
        
    
    }
    
    public function user_exist($data){
        $result = $this->connection();
        //select records from table which is given email
        $select = "SELECT * FROM registered_users WHERE email = '".$data['email']."' ";
        $query = $result->query($select);
        //check the given user account already has or not
        if(mysqli_num_rows($query) > 0){
            return true;
        }

        //select records from table which is given user ID
        $select = "SELECT * FROM pumper WHERE id = '".$data['id']."' ";
        $query = $result->query($select);
        //check the given user account already has or not
        if(mysqli_num_rows($query) > 0){
            return true;
        }
    }
    
}