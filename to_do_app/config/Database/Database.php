<?php

include('Connection.php');

class Database{


    public $task_name;
    public $dbConnection;

    public function __construct(){

        $this->taskName = implode(" ",$_POST);

        $this->dbConnection = Connection::dbConnection();
    }

    public function Create(){

        //start the session
        session_start();

        $sql = "INSERT INTO to_do_lists (task_name)
        VALUES ('$this->taskName')";	

		if(mysqli_query($this->dbConnection, $sql)){
			echo "<h3>Data stored successfully</h3>";

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($this->dbConnection);
		}
		
        $_SESSION['success_message'] = "Task Successfully Saved";

        header('location:../../pages/home.php.php');
    
    }

    public function Select(){

        echo "nkwnke";

        $getdata = "SELECT task_name FROM to_do_lists";


        $result = mysqli_query($this->dbConnection, $getdata);

        if ($result->num_rows > 0) {
    
          // output data of one row
          while($row = $result->fetch_assoc()) 
          {
    
          echo $row["task_name"].'<br> <br>';
          }
        }
          
    }

    
}

$database = new Database;
if($_REQUEST['task_name']){
    $database->Create();
}
    $database->Select();

?>