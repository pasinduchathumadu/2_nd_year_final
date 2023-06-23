
<?php

class Logout extends Controller
{
    
    public function index()
    {
    //    remove all global session variables and destroy the session
        session_unset();
        session_destroy();

        //direct to the unlogged staff manager page
        header('location:http://localhost/PETRO/public/Home/Login');
    }

}