<?php

class M_Forget_password extends Model
{
    protected $table = 'total_user';


    public $send_mail;
    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }
    public function details($data){
        $Email = $data['Email'];
        $result = $this->connection();
        $sql="select *from $this->table where Email = '".$Email."'";
        $query = $result->query($sql);
        if($query->num_rows>0){
            $code=rand(1000,10000);
            $recipient = $Email;
            $subject ="Verification Code";
            $message ="Your verification code is:$code <br><br>Best Regards,<br>PETRO FILLING STATION.";

            $data=[
                'recipient'=>$recipient,
                'subject'=>$subject,
                'message'=>$message,
            ];
            $check=$this->send_mail->send_Mail($data);
            if($check)
            {
                $_SESSION['code']=$code;
                $data=[
                    'Email'=>$Email,
                    'loading'=>'1',
                   ];
                return $data;
               
            }else
            {
                $data=[
                    'loading'=>'2',
                   ];
                return $data;

            }
        }
        else{
           $data=[
            'loading'=>'0',
           ];
            return $data;
        }
    }
}