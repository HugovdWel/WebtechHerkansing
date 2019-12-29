<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';
  if (isset($_POST["placeComment"])){
    postNewPost($_SESSION["User_id"], $_POST["comment"], $_GET["post_id"]);
  }
  session_destroy();
  session_start();
  $_SESSION["User_id"] = 1;
  if(isset($message)){ 
    echo $message;
  }


  $post_id = $_GET["post_id"];
  $postData = retrievePostInfo($post_id);

  echo'<h3 class="textAlignCenter breakWord">' . $postData[0]["postname"] . '</h3>';
  echo'<div class="flex_box flex_justify-center">';
    echo'<div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center forumContainer">';
      echo'<div class="forumPostDetailPageMain flex_item flex_justify-center">';
      echo $postData[0]["post"];
    echo'</div>';
  echo'</div>';

  if(isset($_SESSION["User_id"])){
    
      echo'<div class="limit-size limit-min-size flex_item flex_justify-center flex_box flex_justify-center addPadding">';
        echo'<form action="" method="post" class="addPadding">';
          echo'<label for="comment">Laat een bericht achter!:</label><br/>';
          echo'<textarea name="comment" cols="70" rows="10" placeholder="Een hilarisch bericht." class="addPadding maxWidth"></textarea>';
          echo'<input type="submit" name="placeComment" value="Plaats comment" class="buttonStyle maxWidth"/>';
        echo'</form>';
      echo'</div>';
    echo'</div>';
    
  }


  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 