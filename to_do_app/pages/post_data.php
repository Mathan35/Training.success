<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
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
		
		// Taking task_name value from the form data(input)
		$task_name = $_REQUEST['task_name'];
	
	
        $sql = "INSERT INTO to_do_lists (task_name)
        VALUES ('$task_name')";	

		if(mysqli_query($conn, $sql)){
			echo "<h3>Data stored successfully</h3>";

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);

		?>
        <button>
        <a style = "text-decoration:none;" href="../index.php">back</a>
        </button>
</body>

</html>
