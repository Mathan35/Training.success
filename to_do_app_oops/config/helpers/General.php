<?php

class General{

    public static function passwordEncrypt($password){
        return md5($password);
    }

    public static function checkSession(){

      session_start();

      if(isset($_SESSION['email']) && !empty($_SESSION['email'])){   
      }
      else {
        header('location: ../auth/login.php');  
      }
    }

}

?>