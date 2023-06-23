<?php

class Helpers 
{
    public function date(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('d-m-y');
        return $date;
    }
    public function time(){
        date_default_timezone_set('Asia/Kolkata');
        $date = date('H:i');
        return $date;
    }
}
?>