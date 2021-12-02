<?php

//calling helpers for password encryption
include('../helpers/Genaral.php');

include('../Database/Database.php');

include('../Database/Connection.php');

class Login{

    public $email;
    public $password;
    public $dbConnection;

    public function __construct(){

        $this->email = $_REQUEST['email'];

        $this->password =Genaral::passwordEncrypt($_REQUEST['password']);

        $this->dbConnection = Connection::dbConnection();

       
    }

    public function userLogin(){

        //start the session
         session_start();

         $query_user = "SELECT * FROM `users` WHERE email='$this->email'
         AND passwords='" . $this->password . "'";
         
         $data = mysqli_query($this->dbConnection, $query_user);

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