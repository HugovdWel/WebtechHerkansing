<?php

createDatabaseConnection();

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
    $sql = ("SELECT * from Users WHERE [user_id] = (:gebruikersId)");
    $preparedQuary = $connection->prepare($sql);
    
    $preparedQuary->execute(array(':gebruikersId' => $gebruikersId));
    $data = $preparedQuary->fetchAll();/*
    var_dump($data);
    echo("<br></br>");
    echo($data[0][0]);
    echo("<br></br>");
    echo($data[0]['username']);*/
}


function retrieveForumPage($page){
    global $connection;
    $loadedPosts = (($page * 20) - 20);
    $loadingPosts = ($page * 20);
    $sql = ("SELECT TOP (:loadingPosts) *
            FROM ForumPost
            EXCEPT
            SELECT TOP (:loadedPosts) *
            FROM ForumPost");
    $preparedQuary = $connection->prepare($sql);
    $preparedQuary->execute(array(':loadingPosts' => $loadingPosts, ':loadedPosts' => $loadedPosts));
    $forumData = $preparedQuary->fetchAll();
    var_dump($forumData);
    return $forumData;
}






?>