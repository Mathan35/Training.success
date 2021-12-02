<?php

class Connection{

    private $serverName = "localhost";
    private $userName = "root";
    private $passwords = "";
    private $database = "to_do_app";

    private $dbConnection;

    public static function dbConnection(){

        $this->dbConnection =  mysqli_connect($this->serverName, $this->userName, $this->passwords,$this->database);

        return $this->dbConnection;

    }

}

?>