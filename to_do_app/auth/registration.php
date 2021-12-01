<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">


<form action="../config/register.php" method="post">

<h1>Registration</h1>

<label for="user_name">User Name</label> <br>
<input type="text" name="user_name" id="" required> <br>

<label for="user_name">Email</label><br>
<input type="email" name="email" id="" required> <br>

<label for="user_name">Create Password</label> <br>
<input type="password" name="password" id="" required> <br><br>

<button type="submit">Sign Up</button>

<a style = "margin-left:20px;" href="login.php">Already have an account</a>

</form>

</div>
</div>


<?php
session_start();

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

 if(!empty($_SESSION['email'])){
    header('location:../index.php');
}

?>
    
</body>
</html>