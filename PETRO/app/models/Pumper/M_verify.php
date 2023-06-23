<?php

class M_verify extends Model
{
    public function check($data){
        $code=$data['code'];
        $original_code = $_SESSION['code'];

        if($original_code==$code){
            return true;
        }
        else{
            return false;
        }
    }
}