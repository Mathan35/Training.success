<?php
session_start();
if($_SESSION['email'] == NULL){
    header('location:./auth/login.php');
  }

?>