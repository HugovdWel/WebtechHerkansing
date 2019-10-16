<?php

createDatabaseConnection();
/*retrieveUserData(1);*/

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
    $loadedPosts = (($page * 20) - 20);
    $loadingPosts = ($page * 20);
    global $connection;
    var_dump($connection);
    $sql = ("SELECT TOP (:loadingPosts) *
            from ForumPost
            except
            SELECT TOP (:loadedPosts) *
            from ForumPost");
    $preparedQuary = $connection->prepare($sql);

    $preparedQuary->execute(array(':loadingPosts' => $loadingPosts, ':loadedPosts' => $loadedPosts));
    $forumData = $preparedQuary->fetchAll();
    return $forumData;
}






?>