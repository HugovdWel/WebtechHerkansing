<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';
  
  /*var_dump($forumData);
  foreach($forumData as $post){
    echo $post["user_id"];
  }*/


  if(isset($_GET["paginaNummer"])){
    $paginaNummer = $_GET["paginaNummer"];}
  else{
    $paginaNummer = '0';
  }
  $vorigePagina = $paginaNummer - 1;
  $volgendePagina = $paginaNummer + 1;

  $forumData = retrieveForumPage($paginaNummer, 10);

?>
<div class="flex_box flex_justify-center">
  <div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center forumContainer">
    <?php
      foreach($forumData as $post){
        echo'<div class="forumPostListing flex_item flex_justify-center">
        <a href="">';
            echo $post["postname"];
          echo'</a>';
          echo'<p class="align-right">';
            echo $post["username"];
          echo'</p>';
        echo'</div>';
      }
    ?>
  </div>

  <div class="limit-size limit-min-size flex_item flex_justify-center flex_box flex_justify-center">
    <form action="" method="get">
      <input type="submit" name="paginaNummer" value="<?php echo $vorigePagina; ?>">
      <input type="submit" name="paginaNummer" value="<?php echo $paginaNummer; ?>">
      <input type="submit" name="paginaNummer" value="<?php echo $volgendePagina; ?>">
    </form>
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 