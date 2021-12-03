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
    public function createDatabase(){
       
        // Create database
        $sql = "CREATE DATABASE IF NOT EXISTS to_do_app";
        if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $conn->error;
        }
    }

    public function usersTable(){
        
        // sql to create users table
        $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        users_name VARCHAR(30) NOT NULL,
        email VARCHAR(30) NOT NULL,
        passwords VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        
        if ($conn->query($sql) === TRUE) {
        echo "Table users created successfully";
        } else {
        echo "Error creating table: " . $conn->error;
        }
    }

    public function taskTable(){
        // sql to create users table
        $sql = "CREATE TABLE IF NOT EXISTS to (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        task_name VARCHAR(30) NOT NULL,
        )";
        
        if ($conn->query($sql) === TRUE) {
          echo "Table users created successfully";
        } else {
          echo "Error creating table: " . $conn->error;
        }
    }


}



?>