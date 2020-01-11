<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/forumDatabaseFunctions.php';
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
  <div class="flex_justify-center flex_box forumContainer greenAccent">

    <?php
      foreach($forumData as $post){
        echo'<a class="forumPostListing standardStyle flex_justify-center breakWord" href="../pages/forumDetailPage.php?post_id=' . $post["post_id"] . '">';

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
        if(count($forumData)== 0 && $paginaNummer != 1){
          echo '<meta http-equiv="refresh" content="0;URL= forumMainPage.php?paginaNummer=1" />';
        }
        if($vorigePagina > 0){
          echo '<input type="submit" name="paginaNummer" value="' , $vorigePagina , '">';
          echo '<input type="submit" name="paginaNummer" value="' , $paginaNummer , '">';
        }
        if(count(retrieveForumPage(($paginaNummer + 1), 10))>0){
          echo '<input type="submit" name="paginaNummer" value="' , $paginaNummer , '">';
          echo '<input type="submit" name="paginaNummer" value="' , $volgendePagina , '">';

        }
        echo'</form>';
        echo'</div>';
        if(isset($_SESSION["User_id"])){
          ?>
          <div class="limit-size limit-min-size flex_justify-center flex_box flex_justify-center addPadding">
            <form action="" method="post" class="addPadding">
              <label for="comment" class="maxWidth addPadding">Begin een nieuwe discussie!</label><br/>
              <input type="text" name="title" placeholder="Een duidelijke titel." maxlength="50" minlength="3" class="addPadding">
              <textarea name="comment" cols="70" rows="6" placeholder="Een goed doordacht gespreksonderwerp." maxlength="255" minlength="0" class="addPadding maxWidth"></textarea>
              <input type="submit" name="placePost" class="buttonStyle maxWidth addPadding"/>
            </form>
          </div>
        </div>
      </div>
      <?php
    
  }
  include '../Partials/footer.php'; 
?> 