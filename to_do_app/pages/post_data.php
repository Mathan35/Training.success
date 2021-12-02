<?php
        //connect db
        include('config.connect_db');

		
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
