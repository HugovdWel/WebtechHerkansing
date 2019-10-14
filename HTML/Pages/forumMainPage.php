<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>

<?php 
  include '../../PHP/databaseConnection.php';
  retrieveForumPage(0);
  global $forumdata;
  foreach($post as $forumdata){

  }
?>




<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?>