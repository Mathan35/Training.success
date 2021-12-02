<?php

include('Connection.php');

class Database{


    public function Create(){

        //start the session
        session_start();

        $taskName = implode(" ",$_POST);

        $dbConnection = Connection::dbConnection();

        $sql = "INSERT INTO to_do_lists (task_name)
        VALUES ('$taskName')";	

		if(mysqli_query($dbConnection, $sql)){
			echo "<h3>Data stored successfully</h3>";

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($dbConnection);
		}
		
        $_SESSION['success_message'] = "Task Successfully Saved";

        header('location:../../pages/home.php.php');
    
    }

    public function Select(){

        $getdata = "SELECT task_name FROM to_do_lists";


        $result = mysqli_query($bConnection, $getdata);

        if ($result->num_rows > 0) {
    
          return $result;       
        }
          
    }


}



?>