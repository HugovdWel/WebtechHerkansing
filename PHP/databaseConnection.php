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
    $data = $preparedQuary->fetchAll();
    var_dump($data);
}

function retrieveForumPage($page, $postsPerPage){
    global $connection;

    $loadedPosts = ($page * $postsPerPage);
    $loadingPosts = ($page * $postsPerPage + $postsPerPage);
    //echo $loadedPosts; echo $loadingPosts;
    
    $sql = ("SELECT TOP (:loadingPosts) * FROM ForumPost EXCEPT (SELECT TOP (:loadedPosts) * FROM ForumPost)");
    $preparedQuary = $connection->prepare($sql);
    $preparedQuary->bindParam(':loadedPosts', $loadedPosts, PDO::PARAM_INT);
    $preparedQuary->bindParam(':loadingPosts', $loadingPosts, PDO::PARAM_INT);
    $preparedQuary->execute();

    $forumData = $preparedQuary->fetchAll();
    return $forumData;
}






?>