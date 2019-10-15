<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>

<?php 
  include '../../PHP/databaseConnection.php';
  retrieveForumPage(0);
  global $forumdata;/*
  foreach($post as $forumdata){
*/
?>
<div class="standardStyle flex_box flex_justify-stretch limit-size">
<div class="standardStyle flex_box flex_justify-stretch limit-size">
  <div class="forumPostListing flex_item flex_justify-center">
    tekst

  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?>