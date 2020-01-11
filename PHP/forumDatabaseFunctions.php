<?php
    include 'databaseConnection.php';


    function retrieveForumPage($page, $postsPerPage){
        global $connection;

        $loadedPosts = (($page * $postsPerPage) - $postsPerPage);
        $loadingPosts = ($page * $postsPerPage);

        $sql = (" SELECT TOP (:loadingPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id EXCEPT (SELECT TOP (:loadedPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id) ORDER BY post_id DESC ");
        $preparedQuary = $connection->prepare($sql);
        $preparedQuary->bindParam(':loadedPosts', $loadedPosts, PDO::PARAM_INT);
        $preparedQuary->bindParam(':loadingPosts', $loadingPosts, PDO::PARAM_INT);
        $preparedQuary->execute();
        echo 'loaded ' . $loadedPosts . ' - - - loading ' . $loadingPosts . ' query: ' . var_dump($preparedQuary);

        $forumData = $preparedQuary->fetchAll();
        return $forumData;
    }

    function retrievePostInfo($post_id){
        global $connection;

        $post_id = (int)$post_id;
        
        $sql = ("SELECT * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id WHERE post_id = :post_id");
        $preparedQuary = $connection->prepare($sql);
        $preparedQuary->bindParam(':post_id', $post_id, PDO::PARAM_INT);

        $preparedQuary->execute();

        $postData = $preparedQuary->fetchAll();
        return $postData;
    }

    function createNewComment($user_id, $comment, $post_id){
        global $connection;
        $message = "De comment is succesvol geplaatst!";
        if(strlen($comment) > 2 && strlen($comment) < 256){
            try{
                $sql = ("INSERT INTO Comments([user_id], comment, post_id) VALUES(:user_id, :comment, :post_id)");
                $preparedQuary = $connection->prepare($sql);
                $preparedQuary->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $preparedQuary->bindParam(':comment', $comment, PDO::PARAM_STR);
                $preparedQuary->bindParam(':post_id', $post_id, PDO::PARAM_INT);
                $preparedQuary->execute();
            }catch(PDOException $Exception){
                $message = "Er is iets misgegaan in de database, probeer het later opnieuw";
            }catch(Exception $e){
                $message = "Er is iets misgegaan, probeer het later opnieuw";
            }
        } else {
            $message = "De lengte van de comment is niet binnen de normen";
        }
        return $message;
    }

    function createNewPost($user_id, $postContent, $title){
        global $connection;
        $message = "De comment is succesvol geplaatst!";
        if(strlen($postContent) < 256 && strlen($title) > 2 && strlen($title) < 51){
            try{
                $sql = ("INSERT INTO ForumPost (user_id, postname, post) VALUES(:user_id, :title, :postContent)");
                $preparedQuary = $connection->prepare($sql);
                $preparedQuary->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $preparedQuary->bindParam(':postContent', $postContent, PDO::PARAM_STR);
                $preparedQuary->bindParam(':title', $title, PDO::PARAM_STR);
                $preparedQuary->execute();
            }catch(PDOException $Exception){
                $message = "Er is iets misgegaan in de database, probeer het later opnieuw";
            }catch(Exception $e){
                $message = "Er is iets misgegaan, probeer het later opnieuw";
            }
        } else {
            $message = "De lengte van de comment is niet binnen de normen";
        }
        return $message;
    }

    function retrievePostComments($post_id){
        global $connection;

        $post_id = (int)$post_id;
        
        $sql = ("SELECT * FROM Comments c INNER JOIN Users u ON c.user_id = u.user_id WHERE post_id = :post_id ORDER BY comment_id DESC ");
        $preparedQuary = $connection->prepare($sql);
        $preparedQuary->bindParam(':post_id', $post_id, PDO::PARAM_INT);

        $preparedQuary->execute();

        $postComments = $preparedQuary->fetchAll();
        return $postComments;
    }

?>