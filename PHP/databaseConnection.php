<?php

createDatabaseConnection();
retrieveUserData(1);

function createDatabaseConnection(){

    $dbhost     = "(local)";
    $dbname     = "eendenvrienden";
    $dbuser     = "databaseConnection";
    $dbpass     = "4fpsFTW";

    global $connection;
    $connection = new PDO("sqlsrv:Server=$dbhost;Database=$dbname;ConnectionPooling=0","$dbuser","$dbpass");
}

function retrieveUserData($gebruikersId){
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


function retrieveForumPage($page){
    $loadedPosts = ($page * 20);
    global $connection;
    $sql = ("SELECT * from Users WHERE userNumber = (:gebruikersId)");
    $preparedQuary = $connection->prepare($loadedPosts);

    $preparedQuary->execute();
    global $forumData = $preparedQuary->fetchAll();
}



// echo $result[0];


?>