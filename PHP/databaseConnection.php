<?php
$dbhost     = "(local)";
$dbname     = "eendenvrienden";
$dbuser     = "databaseConnection";
$dbpass     = "4fpsFTW";

createDatabaseConnection();

function createDatabaseConnection(){

    global $dbhost, $dbname, $dbuser, $dbpass;

    $connection = new PDO("sqlsrv:Server=$dbhost;Database=$dbname;ConnectionPooling=0","$dbuser","$dbpass");

    $sql = ("select * from Users");
    $preparedQuary = $connection->prepare($sql);

    $preparedQuary->execute();
    $data = $preparedQuary->fetch();
    var_dump($data);
    echo("<br></br>");
    echo($data[1]);
}


// echo $result[0];


?>