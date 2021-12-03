<?php
    
    include('../config/helpers/General.php');
    General::checkSession();

    include('../config/Authentication/Authorization.php');
    $user_data = new Authorization;
    $user_data->getUser(); 

    include('../config/Database/Database.php');
    $database = new Database;
    $database->Select();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do Application</title>
</head>
<body>

  <div style = "text-align:right;" >

  <form action="../config/Authentication/Logout.php" method="POST">
    <button type="submit">Logout</button>
  </form>
  </div>

<br><br>

<h1 style = "font-size:16px;  color:green; text:bold; margin-left:30px;"><?php  session_start(); echo $_SESSION['success_message'] ?></h1>

<h1 style = "font-size:16px; text-align:center; color:blue;">
     
      <?php  
         while($row = $result->fetch_assoc()) 
          {
            echo "Welcome ".$row["users_name"]."...!";
          }
      ?>

</h1>


 
<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">
 <h1>To Do App</h1>


 <form action="../config/Database/Database.php" method="post">

  <label for="task_name">Task Name</label> <br>
  <input type="text" name="task_name" id="">

  <button type="submit">Submit</button>

 </form>

</div>
</div>

<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">
<h1>Tasks List :-</h1>

<div>
  
<?php
   while($row = $result->fetch_assoc()) 
   {

   echo $row["task_name"].'<br> <br>';
   }
?>
    
</div>



</div>
</div>

</body>
</html>
