<?php

class Controller
{
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'login';
        $URL = explode("/",trim($URL,"/"));
        return $URL;

    }
    public function view($name,$data = []){
        $filename ="../app/views/".$name.".view.php";
        if(file_exists($filename))
        {
            require $filename;
        }
        else{
            $URL=$this->splitURL();
            $filename = "../app/views/".ucfirst($URL[0])."/404.view.php";
            require $filename;
        }

    }
    public function model($model){
        $URL=$this->splitURL();
        require_once '../app/models/'.ucfirst($URL[0]).'/'.$model.'.php';

        return new $model();
    }
}