<?php
    include('../helpers/General.php');

    include('../Database/Connection.php');

class Registration{

    public $password;
    public $dbConnection;

    public function Register(){

        //start the session
        session_start();

        $this->dbConnection = Connection::dbConnection();

        $passwordEncrypt = General::passwordEncrypt($_POST['passwords']);

        $fields = array_keys($_POST);

        $passwordReplace = array_replace($_POST,['passwords' =>$passwordEncrypt ]);

        $str_keys = implode(",",$fields);

        $str_values = implode("','",$passwordReplace);

        $sql = "INSERT INTO users ($str_keys)
        VALUES ('$str_values')";	

        // print_r($sql); die;
		
        mysqli_query($this->db_connection, $sql);

		if(mysqli_query($this->db_connection, $sql)){
           $_SESSION['succes_message'] = 'Successfully Registered';
            header('location:../../auth/login.php');

		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($this->db_connection);
		}
		
		// Close connection
		mysqli_close($this->db_connection);



    
    }
}

$athentication = new Registration;
$athentication->Register();

?>