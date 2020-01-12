<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>

<?php 
  include '../../PHP/forumDatabaseFunctions.php';
  if (isset($_POST["placeComment"])){
    createNewComment($_SESSION["User_id"], $_POST["comment"], $_GET["post_id"]);
    $redirectLocation = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    echo '<meta http-equiv="refresh" content="0;URL= "$redirectLocation />';
  }

  $post_id = $_GET["post_id"];
  $postData = retrievePostInfo($post_id);
  if(count($postData) > 0){
    
    echo'<h3 class="textAlignCenter breakWord">' . $postData[0]["postname"] . '</h3>';
    echo'<div class="flex_box flex_justify-center flex_direction-column">';
      echo'<div class="flex_justify-center flex_box flex_justify-center forumContainer greenAccent">';
        echo'<div class="forumPostDetail flex_justify-center standardStyle">';
        echo '<p class="commentSizeLimiter">' . $postData[0]["post"] . '</p>';
        echo'<p class="align-right username">';
          echo $postData[0]["username"];
        echo'</p>';
      echo'</div>';
    echo'</div>';

    $postComments = retrievePostComments($post_id);
      if(count($postComments) > 0 ){
      echo'<div class="flex_box flex_justify-center forumContainer">';
        echo'<div class="standardStyle forumContainer blueAccent">';
          foreach($postComments as $comment){
            echo'<div class="standardStyle flex_box roundCorners forumPostListing">';
              echo'<p class="commentSizeLimiter">' . $comment["comment"] . '</p>';
              echo'<p class="username">';
                echo $comment["username"];
              echo'</p>';
            echo'</div>';
          }
        echo'</div>';
      echo'</div>';
    }

      if(isset($_SESSION["User_id"])){
          echo'<div class="limit-size limit-min-size flex_justify-center flex_box flex_justify-center addPadding">';
            echo'<form action="" method="post" class="addPadding">';
              echo'<label for="comment" class="addPadding">Laat een bericht achter!</label><br/>';
              echo'<textarea name="comment" cols="70" rows="6" placeholder="Een hilarisch bericht." maxlength="255" minlength="3" class="addPadding maxWidth"></textarea>';
              echo'<input type="submit" name="placeComment" value="Plaats comment" class="buttonStyle maxWidth addPadding"/>';
            echo'</form>';
          echo'</div>';
        echo'</div>';
      }
    }else{
      echo'Deze pagina bestaat niet! Als je nog eens probeert deze website kapot te maken zullen wij de internet politie inlichten. ';
    }


  include '../Partials/footer.php'; 
?> 