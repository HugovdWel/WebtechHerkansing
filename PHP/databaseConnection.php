<?php
$dbhost     = "localhost";
$dbname     = "Eendenvrienden";
$dbuser     = "root";
$dbpass     = "";

                                                                                echo" Ik wordt geladen ";

createDatabaseConnection();

function createDatabaseConnection(){

    global $dbhost, $dbname, $dbuser, $dbpass;
                                                                                echo" Ik run ";
    try{
        $connection = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    } catch(PDOExeption $e){
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
                                                                                echo" Ik crash ";
    }
}

// $quary = sprintf("select * from forumpost");
// $result = mysql_query($query);
var_dump($result);
// echo $result[0];


?>