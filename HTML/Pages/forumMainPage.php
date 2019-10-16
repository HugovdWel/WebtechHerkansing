<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';
  $forumdata = NULL;
  retrieveForumPage(1);
  echo'data incomming <br>';
  echo $forumdata[0];
  var_dump($forumdata);
  
  /*
  foreach($post as $forumdata){
*/
?>
<div class="flex_box flex_justify-center">
  <div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center ">

    <div class="forumPostListing flex_item flex_justify-center forum-listing">
      tekst<br>woord<br>sahbdbw<br>asd
    </div>
    
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?>