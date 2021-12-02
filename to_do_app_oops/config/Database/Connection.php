<?php

class Connection{

    static $serverName = "localhost";
    static $userName = "root";
    static $passwords = "";
    static $database = "to_do_app";

    // static $dbConnection;
    public static function dbConnection(){

        $dbConnection =  mysqli_connect(self::$serverName, self::$userName, self::$passwords,self::$database);
        return  $dbConnection;
        
    }

}

?>