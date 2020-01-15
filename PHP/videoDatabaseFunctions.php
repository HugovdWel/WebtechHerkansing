<?php
    include 'databaseConnection.php';

    
    function getVideos($category, $amount){
        global $connection;
        if($category == NULL){
            $sql = ("SELECT TOP (:loadingVideos) * FROM VIDEO ORDER BY video_id DESC");
            $preparedQuery = $connection->prepare($sql);
            $preparedQuery->bindParam(':loadingVideos', $amount, PDO::PARAM_INT);
        }else{
            $sql = ("SELECT TOP (:loadingVideos) * FROM VIDEO WHERE CATEGORY = :category ORDER BY video_id DESC");
            $preparedQuery = $connection->prepare($sql);
            $preparedQuery->bindParam(':category', $category, PDO::PARAM_STR);
            $preparedQuery->bindParam(':loadingVideos', $amount, PDO::PARAM_INT);
        }

        $preparedQuery->execute();

        $videos = $preparedQuery->fetchAll();
        return $videos;
    }

?>