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

    $loadedPosts = ($page * $postsPerPage - $postsPerPage);
    $loadingPosts = ($page * $postsPerPage);
    
    $sql = ("SELECT TOP (:loadingPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id EXCEPT (SELECT TOP (:loadedPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id)");
    $preparedQuary = $connection->prepare($sql);
    $preparedQuary->bindParam(':loadedPosts', $loadedPosts, PDO::PARAM_INT);
    $preparedQuary->bindParam(':loadingPosts', $loadingPosts, PDO::PARAM_INT);
    $preparedQuary->execute();

    $forumData = $preparedQuary->fetchAll();
    return $forumData;
}

function retrievePostInfo($post_id){
    global $connection;

    $post_id = (int)$post_id;
    
    $sql = ("SELECT * FROM ForumPost WHERE post_id = :post_id");
    $preparedQuary = $connection->prepare($sql);
    $preparedQuary->bindParam(':post_id', $post_id, PDO::PARAM_INT);

    $preparedQuary->execute();

    $postData = $preparedQuary->fetchAll();
    return $postData;
}

function postNewPost($user_id, $comment, $post_id){
    global $connection;
    $message = "De comment is succesvol geplaatst!";
    $comment = "'" . $comment . "'";
    try{
        $sql = ("INSERT INTO Comments([user_id], comment, post_id, [date]) VALUES(:user_id, :comment, :post_id, GETDATE())");
        $preparedQuary = $connection->prepare($sql);
        echo $user_id . "<br>";
        echo $comment . "<br>";
        echo $post_id . "<br>";
        $preparedQuary->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $preparedQuary->bindParam(':comment', $comment, PDO::PARAM_STR);
        $preparedQuary->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $preparedQuary->execute();
    }catch(PDOException $Exception){
        $message = "Er is iets misgegaan in de database, probeer het later opnieuw";
    }catch(Exception $e){
        $message = "Er is iets misgegaan, probeer het later opnieuw";
    }

    return $message;
}





?>