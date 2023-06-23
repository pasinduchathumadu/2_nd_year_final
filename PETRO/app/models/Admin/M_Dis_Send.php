<?php

class M_Dis_Send extends Model{
    protected $table = 'distribution_manager';

    public $send_mail;

    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    public function records($data){
        $id = $_SESSION['distribution_manager_id'];
        $result = $this->connection();
        $sql = "select *from $this->table where distribution_manager_id='".$id."'";
        $query = $result->query($sql);
        while($row = $query->fetch_assoc()){
            $first=$row['First_name'];
            $last = $row['Last_name'];
        }
        $email = $data['email'];
        $password = $data['password'];

        $recipient = $email;
        $subject = "ACCOUNT DETAILS";
        $message = "Hi $first &nbsp;$last &nbsp;<br>&nbsp;&nbsp;&nbsp;
        Your Manger ID: $id<br>&nbsp;&nbsp;&nbsp;
        Password:$password<br>
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