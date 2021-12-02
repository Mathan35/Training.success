<?php
include('../Database/Connection.php');

class Athorisation{

  
    public $dbConnection;
    public $email;

    public function __construct(){

        session_start();

        $this->email = $_SESSION['email'];
        $this->dbConnection = Connection::dbConnection();

        
    }


    public function getUser($username){
        
        $user_data = "SELECT users_name FROM `users` WHERE email='$this->email'";

        $result = mysqli_query($this->dbConnection, $user_data);


        if ($result->num_rows > 0) {
    
          while($row = $result->fetch_assoc()) 
          {
            echo "Welcome ".$row["users_name"]."...!";
          }
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