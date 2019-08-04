<?php
$servername = "localhost";
$username = "username";
$password = "password";


function createDatabaseConnection(){
    
    global $servername, $username, $password;

    try{
        $server = new mysqli($servername, $username, $password);
    } catch(PDOExeption $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
}


?>