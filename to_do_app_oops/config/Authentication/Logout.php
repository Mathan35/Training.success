<?php

class Logout{
 
    static function userLogout(){
        session_start();
        session_destroy();
        header('location:../../auth/login.php');
    }
}

Logout::userLogout();

?>


