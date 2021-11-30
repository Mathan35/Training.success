
<?php
 
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$database = "to_do_app";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$database);

$email = $_REQUEST['email'];
$password = $_REQUEST['password'];

$_SESSION['email'] = $email;

  
  $query_user    = "SELECT * FROM `users` WHERE email='$email'
  AND passwords='" . md5($password) . "'";

$data = mysqli_query($conn, $query_user);

$users = mysqli_num_rows($data);

if ($users == 1) {

// Redirect to user dashboard page
header("Location: ../index.php");
} 

else {
$_SESSION['login_error'] = "Credential Mismatch";

header("Location: ../auth/login.php");

}

?>
