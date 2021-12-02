<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">

<form action="../config/check_user.php" method="POST">
<h1>Login</h1>

<p style = "color:red; text:bold"><?php  session_start(); echo $_SESSION['login_error']?></p>

<label for="user_name">Email</label><br>
<input type="email" name="email" id="" required> <br>

<label for="user_name">Password</label> <br>
<input type="password" name="password" id="" required> <br><br>

<button type="submit">Sign in</button>

<a style = "margin-left:20px;" href="registration.php">New User</a>

</form>
</div>
</div>


<?php

if($_SESSION['email'] != NULL){
    header('location:../index.php');
}

//connect db
include('config.connect_db');

$sqltable = "CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    users_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    passwords VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
 mysqli_query($conn, $sqltable);
 $created = mysql_query( $sqltable, $conn );
 
 if(! $created ) {
    die('Could not create database: ' . mysql_error());
 }

?>
    
</body>
</html>