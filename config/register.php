<?php
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
		
		// Taking task_name value from the form data(input)
		$user_name = $_REQUEST['user_name'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
	
	
        $sql = "INSERT INTO users (users_name,email,passwords)
        VALUES ('$user_name','$email','".md5($password)."')";	

		if(mysqli_query($conn, $sql)){
           $_SESSION['message'] = 'Successfully Registered';
            header('location:auth.login.php');

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);

		?>