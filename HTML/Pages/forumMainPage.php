<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';

  if(isset($_GET["paginaNummer"])){
    $paginaNummer = $_GET["paginaNummer"];}
  else{
    $paginaNummer = '1';
  }
  $vorigePagina = $paginaNummer - 1;
  $volgendePagina = $paginaNummer + 1;

  $forumData = retrieveForumPage($paginaNummer, 10);

?>
<div class="flex_box flex_justify-center">
  <div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center forumContainer">

    <?php
      foreach($forumData as $post){
        echo'<a class="forumPostListing flex_item flex_justify-center" href="../pages/forumDetailPage.php?post_id=' . $post["post_id"] . '">';

            echo $post["postname"];

          echo'<p class="align-right username">';
            echo $post["username"];
          echo'</p>';

        echo'</a>';
      }
    ?>
  </div>

  <div class="limit-size limit-min-size flex_item flex_justify-center flex_box flex_justify-center">
    <form action="" method="get">
      <?php
        if($vorigePagina > 0){
          echo '<input type="submit" name="paginaNummer" value="' , $vorigePagina , '">';
        }
        echo '<input type="submit" name="paginaNummer" value="' , $paginaNummer , '">';
        if(count($forumData)>9){
          echo '<input type="submit" name="paginaNummer" value="' , $volgendePagina , '">';
        }
        
      ?>
    </form>
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 