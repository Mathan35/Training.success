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
     <a style = "font-size:17px; margin:30px;" href="./config/logout.php">Logout</a> 
  </div>

<br><br>


<h1 style = "font-size:16px; text-align:center; color:blue;">
<?php 
  
    //checking auth condition


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
    // //connect db
    // include('config.connect_db');

    $user_email = $_SESSION['email'];
    $sql = "SELECT users_name FROM users WHERE email='$user_email'";

    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {

      // output data of one row
      while($row = $result->fetch_assoc()) 
      {

      echo "Welcome ".$row["users_name"]."...!";
      }
    } 

?>
</h1>


 
<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">
 <h1>To Do App</h1>


 <form action="./pages/post_data.php" method="post">

  <label for="task_name">Task Name</label> <br>
  <input type="text" name="task_name" id="">

  <button type="submit">Submit</button>

 </form>

</div>
</div>

<div style = "border:1px solid black; width:fit-content; margin:30px;">
<div style = "padding:20px;">
<h1>Tasks List :-</h1>


<?php
 $getdata = mysqli_query($conn,"SELECT * FROM to_do_lists");
 while($data = mysqli_fetch_assoc($getdata)) {
?>

<div>
        <p><?php echo $data['task_name']; ?></p>
</div>


<?php
 }
?>


</div>
</div>

</body>
</html>
