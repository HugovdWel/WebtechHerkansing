<?php

createDatabaseConnection();
haalGebruikersData(1);

function createDatabaseConnection(){

    $dbhost     = "(local)";
    $dbname     = "eendenvrienden";
    $dbuser     = "databaseConnection";
    $dbpass     = "4fpsFTW";

    global $connection;
    $connection = new PDO("sqlsrv:Server=$dbhost;Database=$dbname;ConnectionPooling=0","$dbuser","$dbpass");
}

function haalGebruikersData($gebruikersId){
    global $connection;
    $sql = ("SELECT * from Users WHERE userNumber = (:gebruikersId)");
    $preparedQuary = $connection->prepare($gebruikersId);

    $preparedQuary->execute();
    $data = $preparedQuary->fetchAll();
    var_dump($data);
    echo("<br></br>");
    echo($data[0][0]);
    echo("<br></br>");
    echo($data[1][0]);
}

function haalPersoonsGegevens($gebruikersId){

}


// echo $result[0];


?>