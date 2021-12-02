
<?php
 //connect db

session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "to_do_app";

 // Create connection
 $conn = mysqli_connect($servername, $username, $password,$database);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

  
  $query_user    = "SELECT * FROM `users` WHERE email='$email'
  AND passwords='" . md5($password) . "'";

$data = mysqli_query($conn, $query_user);

$users = mysqli_num_rows($data);
echo $users;
if ($users == 1) {
  $_SESSION['email'] = $email;

// Redirect to user dashboard page
header("Location: ../index.php");
} 

else {
$_SESSION['login_error'] = "Credential Mismatch";

header("Location: ../auth/login.php");

}

?>
