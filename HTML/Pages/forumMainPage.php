<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';
  $forumData = retrieveForumPage(0, 5);
  //var_dump($forumData);

  foreach($forumData as $post){
    echo $post["user_id"];
    
  }

?>
<div class="flex_box flex_justify-center">
  <div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center ">
    <?php
      foreach($forumData as $post){
        var_dump($post["user_id"]);/*
        echo'
        <div class="forumPostListing flex_item flex_justify-center forum-listing">
          ' + $post[user_id] + '
        </div>';*/
      }
    ?>
    
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 