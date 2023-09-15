<?php

class M_Send extends Model{
    protected $table = 'registered_users';

    public $send_mail;

    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    public function records($data){
        $id = $_SESSION['customer_manager_id'];
        $email = $data['email'];
        $password = $data['password'];

        $result = $this->connection();
        $sql = "select *from $this->table where email='".$email."' AND role = 'staff'";
        $query = $result->query($sql);
        while($row = $query->fetch_assoc()){
            $first=$row['fname'];
            $last = $row['lname'];
        }
       
        $recipient = $email;
        $subject = "ACCOUNT DETAILS";
        $message = "Hi $first &nbsp;$last &nbsp;<br>&nbsp;&nbsp;&nbsp;
        Your Manger ID: $id<br>&nbsp;&nbsp;&nbsp;
        Password:$password<br>&nbsp;
        This is your username and password.First you have to login to the system using above credentials.after password can be changed as your wish.<br><br><br>Best Regards;&#013;<br>Petro Filling Station.<br>";
        $data=[
            'recipient'=>$recipient,
            'subject'=>$subject,
            'message'=>$message,
        ];
        
        $check=$this->send_mail->send_Mail($data);
        if($check){
            $data=[
                'first'=>$first,
                'last'=>$last,
                'error'=>0,
            ];
            return $data;
        }
        else{
            $data=[
                'first'=>$first,
                'last'=>$last,
                'error'=>1,
            ];
            return $data;
        }

    }
}