<?php
include('../Database/Connection.php');

class Authorization{

  public $email;

    public function __construct(){

        session_start();

        $this->email = $_SESSION['email'];
        
    }

    public function getUser(){
      
        $dbConnection = Connection::dbConnection();
        
        $user_data = "SELECT users_name FROM `users` WHERE email='$this->email'";

        $result = mysqli_query($dbConnection, $user_data);


        if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row;
        }
          
    }

    public function authCheck(){

          if(isset($_SESSION['email']) && !empty($_SESSION['email'])){
          header('location: ../../to_do_app/pages/home.php');   
      }
    }

    public function checkSession(){

    if(isset($_SESSION['email']) && empty($_SESSION['email'])){
        header('location: ./auth/login.php'); 
    }  
  }



}


?>