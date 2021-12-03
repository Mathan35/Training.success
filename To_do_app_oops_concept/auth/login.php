<?php  
  include('../config/Authentication/Authorization.php');
  $authCheck = new Authorization;
  $authCheck->authCheck();
  
?>


<!DOCTYPE html>
<html lang="en">
< head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
 </head>

  <body>

   <div style = "border:1px solid black; width:fit-content; margin:30px;">
      <div style = "padding:20px;">

       <form action="../config/Authentication/Login.php" method="POST">
         <h1>Login</h1>
 
         <p style = "color:green; text:bold"><?php  session_start(); echo $_SESSION['succes_message']?></p>

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

    
  </body>
</html>