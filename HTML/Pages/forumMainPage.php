<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';
  if (isset($_POST["placePost"])){
    createNewPost($_SESSION["User_id"], $_POST["comment"], $_POST["title"]);
    $redirectLocation = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo '<meta http-equiv="refresh" content="0;URL= "$redirectLocation />';
  }

  if(isset($_GET["paginaNummer"])){
    $paginaNummer = $_GET["paginaNummer"];}
  else{
    $paginaNummer = '1';
  }
  $vorigePagina = $paginaNummer - 1;
  $volgendePagina = $paginaNummer + 1;

  $forumData = retrieveForumPage($paginaNummer, 10);

?>
<h3 class="textAlignCenter breakWord">Forum</h3>
<div class="flex_box flex_justify-center">
  <div class="flex_justify-center standardStyle flex_box forumContainer">

    <?php
      foreach($forumData as $post){
        echo'<a class="forumPostListing flex_justify-center breakWord" href="../pages/forumDetailPage.php?post_id=' . $post["post_id"] . '">';

            echo $post["postname"];

          echo'<p class="align-right username">';
            echo $post["username"];
          echo'</p>';

        echo'</a>';
      }
    ?>
  </div>

  <div class="limit-size limit-min-size flex_justify-center flex_box flex_justify-center">
    <form action="" method="get">
      <?php
        if($vorigePagina > 0){
          echo '<input type="submit" name="paginaNummer" value="' , $vorigePagina , '">';
        }
        echo '<input type="submit" name="paginaNummer" value="' , $paginaNummer , '">';
        if(count($forumData)>9){
          echo '<input type="submit" name="paginaNummer" value="' , $volgendePagina , '">';

        }
        echo'</form>';
        echo'</div>';
        if(isset($_SESSION["User_id"])){
          echo'<div class="limit-size limit-min-size flex_justify-center flex_box flex_justify-center addPadding">';
            echo'<form action="" method="post" class="addPadding">';
              echo'<label for="comment" class="maxWidth">Begin een nieuwe discussie!</label><br/>';
              echo'<input type="text" name="title" placeholder="Een duidelijke titel." maxlength="50" minlength="5" >';
              echo'<textarea name="comment" cols="70" rows="10" placeholder="Een goed doordacht gespreksonderwerp." maxlength="255" minlength="10" class="addPadding maxWidth"></textarea>';
              echo'<input type="submit" name="placePost" class="buttonStyle maxWidth"/>';
            echo'</form>';
          echo'</div>';
        echo'</div>';
      echo'</div>';
    
  }
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 