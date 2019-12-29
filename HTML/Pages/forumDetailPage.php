<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';





  $post_id = $_GET["post_id"];
  $postData = retrievePostInfo($post_id);

  echo'<h3 class="textAlignCenter breakWord">' . $postData[0]["postname"] . '</h3>';
  echo'<div class="flex_box flex_justify-center">';
    echo'<div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center forumContainer">';
      echo'<div class="forumPostDetailPageMain flex_item flex_justify-center">';
      echo $postData[0]["post"];
    echo'</div>';
  echo'</div>';
?>
  <div class="limit-size limit-min-size flex_item flex_justify-center flex_box flex_justify-center addPadding">
    <form action="" method="post" class="addPadding">
      <label for="comment">Laat een bericht achter!:</label><br />
      <textarea name="comment" cols="70" rows="10" placeholder="Een hilarisch bericht." class="addPadding maxWidth"></textarea>
      <input type="submit" name="submit" value="Plaats comment" class="buttonStyle maxWidth"/>


    </form>
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 