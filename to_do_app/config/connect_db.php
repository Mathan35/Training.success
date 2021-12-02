<?php

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

?>