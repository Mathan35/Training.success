<?php

//calling helpers for password encryption
include('../helpers/General.php');

include('../Database/Connection.php');

class Login{


    public function userLogin(){
        
         //start the session
         session_start();

         $email = $_REQUEST['email'];

         $password =General::passwordEncrypt($_REQUEST['password']);

         $dbConnection = Connection::dbConnection();

         $query_user = "SELECT * FROM `users` WHERE email='$email'
         AND passwords='" . $password . "'";

         $data = mysqli_query($dbConnection , $query_user);

         $users = mysqli_num_rows($data);

         if ($users == 1) {
            $_SESSION['email'] = $_REQUEST['email'];

            // Redirect to user dashboard page
            return header("Location: ../../pages/home.php");
         } 
         else 
         {
            // Redirect to login page with error msge
            $_SESSION['login_error'] = "Credential Mismatch";
            return header("Location: ../../auth/login.php");
          }
    
    }


}

$athentication = new Login;
$athentication->userLogin();

?>