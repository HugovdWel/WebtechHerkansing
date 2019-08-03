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

<section class="forum flex_box">
    <div id="flex_item">
        
    </div>

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