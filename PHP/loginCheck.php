<?PHP
include '../../PHP/databaseConnection.php';

    global $connection;
    
    $sql = ("SELECT TOP (:loadingPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id EXCEPT (SELECT TOP (:loadedPosts) * FROM ForumPost f INNER JOIN Users u ON f.user_id = u.user_id)");
    $preparedQuary = $connection->prepare($sql);
    $preparedQuary->bindParam(':loadedPosts', $loadedPosts, PDO::PARAM_INT);
    $preparedQuary->bindParam(':loadingPosts', $loadingPosts, PDO::PARAM_INT);
    $preparedQuary->execute();

    $forumData = $preparedQuary->fetchAll();

    foreach($forumData as $post){
        echo'<div class="forumPostListing flex_item flex_justify-center">';
        echo $post["postname"];
        $post["username"];
  
      }

?>