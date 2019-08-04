<?php
$servername = "localhost";
$username = "root";
$password = "";
                                                                                echo" Ik wordt geladen ";

createDatabaseConnection();

function createDatabaseConnection(){

    global $servername, $username, $password;
                                                                                echo" Ik run ";
    try{
        $server = new mysqli($servername, $username, $password);
    } catch(PDOExeption $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
                                                                                echo" Ik crash ";
    }
}



?>