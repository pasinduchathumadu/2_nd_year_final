<?php
class Database{
    public function connect(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "final_petro";
        $conn = new mysqli($servername, $username, $password, $dbname);
        return $conn;
    }


}