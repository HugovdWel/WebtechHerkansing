<?php
    include 'databaseConnection.php';

    
    function getVideos($category, $amount){
        global $connection;
        if($category == NULL){
            $sql = ("SELECT TOP (:loadingVideos) * FROM VIDEO ORDER BY video_id DESC");
            $preparedQuary = $connection->prepare($sql);
            $preparedQuary->bindParam(':loadingVideos', $amount, PDO::PARAM_INT);
        }else{
            $sql = ("SELECT TOP (:loadingVideos) * FROM VIDEO WHERE CATEGORY = :category ORDER BY video_id DESC");
            $preparedQuary = $connection->prepare($sql);
            $preparedQuary->bindParam(':category', $category, PDO::PARAM_STR);
            $preparedQuary->bindParam(':loadingVideos', $amount, PDO::PARAM_INT);
        }

        $preparedQuary->execute();

        $videos = $preparedQuary->fetchAll();
        return $videos;
    }

?>