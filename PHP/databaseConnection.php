<?php
$dbhost     = "(local)";
$dbname     = "eendenvrienden";
$dbuser     = "databaseConnection";
$dbpass     = "4fpsFTW";

createDatabaseConnection();

function createDatabaseConnection(){

    global $dbhost, $dbname, $dbuser, $dbpass;

    $connection = new PDO("sqlsrv:Server=$dbhost;Database=$dbname;ConnectionPooling=0","$dbuser","$dbpass");

}

$sql = ("select * from forumpost");
$preparedQuary = $dbh->prepare($query);
$preparedQuary->execute(
    array( ':cijfer' => $cijfer, 	':vak' => $vak	));
var_dump($preparedQuary);
// echo $result[0];


?>