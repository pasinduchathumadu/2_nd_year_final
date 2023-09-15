<?php

class App
{
    private $controller = 'Login.php';
    private $method = 'index';
    private function splitURL()
    {
        $URL = $_GET['url'] ?? 'login';
        $URL = explode("/",trim($URL,"/"));
        return $URL;

    }
    public function loadController()
    {
        $URL = $this->splitURL();
        
        $filename = "../app/controllers/".ucfirst($URL[0])."/".ucfirst($URL[1]).".php";
        if(((ucfirst($URL[0])=="Home") && ucfirst($URL[1]=="Login"))||((ucfirst($URL[0])=="Home") && ucfirst($URL[1]=="Home"))||(ucfirst($URL[0]=="Pumper")&&(ucfirst($URL[1]=="Forget_password")))||(ucfirst($URL[0]=="Pumper")&&(ucfirst($URL[1]=="Verify")))||(ucfirst($URL[0]=="Pumper")&&(ucfirst($URL[1]=="Reset")))){
            require $filename;
            $this->controller = ucfirst($URL[1]);
            unset($URL[1]);

        }
        else if((file_exists($filename))&&($_SESSION))
        {
            require $filename;
            $this->controller = ucfirst($URL[1]);
            unset($URL[1]);
        }
        else{
                $filename="../app/controllers/Pumper/_404.php";
                require $filename;
                $this->controller = "_404";
        }
        $controller = new $this->controller;
        if(!empty($URL[2])){
            if(method_exists($controller,$URL[2])){
                $this->method = $URL[2];
                unset($URL[2]);
            }
        }
        call_user_func_array([$controller,$this->method],$URL);
    }

}

