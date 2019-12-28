<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
  include '../../PHP/databaseConnection.php';





  $post_id = $_GET["post_id"];
  $forumData = retrievePostInfo($post_id);

?>
<div class="flex_box flex_justify-center">
  <div class="limit-size limit-min-size flex_item flex_justify-center standardStyle flex_box flex_justify-center forumContainer">
    <?php
      echo'<div class="forumPostListing flex_item flex_justify-center">';
      echo'</div>';
    ?>
  </div>

  <div class="limit-size limit-min-size flex_item flex_justify-center flex_box flex_justify-center">
    <form action="" method="get">
      <input type="submit" name="paginaNummer" value="' , $vorigePagina , '">

        <label for="comment">Comment:</label><br />
        <textarea name="comment" cols="70" rows="10">{comment}</textarea>
        <label><input type="checkbox" name="save_info" value="yes" {save_info} /> Remember my personal information</label><br />
        <label><input type="checkbox" name="notify_me" value="yes" {notify_me} /> Notify me of follow-up comments?</label><br />


        <input type="submit" name="submit" value="Submit" />
        <input type="submit" name="preview" value="Preview" />


    </form>
  </div>
</div>


<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php'; 
?> 