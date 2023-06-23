<?php

class M_email extends Model{
    public $send_mail;
    protected $table = 'pumper';

    public function __construct(){
        $this->send_mail=$this->mail('Library');
    }

    public function records($data){
        $pumper_id = $data['pumperid'];
        $mashine_id = $data['MashineID'];
        $type = $data['type']; //this shows this email for aeesign or remove

        

        date_default_timezone_set("Asia/Colombo");  //set colombo time zone
        $currentTime = time() + 15 * 60;        // Add 15 minutes to the Time object
        $current_time =date("h:i:sa",$currentTime);  // Format the Time object 

        $result = $this->connection();
        $sql = "select * from $this->table where id ='".$pumper_id."'";
        $query = $result->query($sql);

        while($row = $query->fetch_assoc()){
            $first=$row['first_name'];
            $last = $row['last_name'];
            $email = $row['email'];
        }
    
        $recipient = $email;
        

        if($type == 1){
            $subject = "ASSIGN YOU TO A PUMPER MASHINE";

            $message = "Hi $first &nbsp;$last &nbsp;<br>&nbsp;&nbsp;&nbsp;
            You Assigned to Pumper Mashine : $mashine_id<br>&nbsp;&nbsp;&nbsp;
            Assigned time: $current_time<br>&nbsp;
            You shoud be at the mashine number ($mashine_id) on or before $current_time. Please make sure ur shift on time.<br><br><br>Best Regards;&#013;<br>Petro Filling Station.<br>";
        }else{
            $subject = "SHIFT OVER FROM PUMPER MASHINE";

            $message = "Hi $first &nbsp;$last &nbsp;<br>&nbsp;&nbsp;&nbsp;
            Current shift Pumper Mashine : $mashine_id<br>&nbsp;&nbsp;&nbsp;
            Shift over time: $current_time<br>&nbsp;
            You'r current shift will over at $current_time from the mashine number ($mashine_id).<br><br><br>Best Regards;&#013;<br>Petro Filling Station.<br>";
        }
        
        $emaildata=[
            'recipient'=>$recipient,
            'subject'=>$subject,
            'message'=>$message,
        ];

        $check=$this->send_mail->send_Mail($emaildata);
        if($check){
            $output=[
                'pumperid'=>$pumper_id,
                'first'=>$first,
                'last'=>$last,
                'error'=>0,
            ];
            return $data;
        }
        else{
            $output=[
                'pumperid'=>$pumper_id,
                'first'=>$first,
                'last'=>$last,
                'error'=>1,
            ];
            return $output;
        }

    }
}