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


<form action="../config/Authentication/Registration.php" method="post">

<h1>Registration</h1>

<label for="user_name">User Name</label> <br>
<input type="text" name="users_name" id="" required> <br>

<label for="user_name">Email</label><br>
<input type="email" name="email" id="" required> <br>

<label for="user_name">Create Password</label> <br>
<input type="password" name="passwords" id="" required> <br><br>

<button type="submit">Sign Up</button>

<a style = "margin-left:20px;" href="login.php">Already have an account</a>

</form>

</div>
</div>
    
</body>
</html>