<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php';
?>

<div class="flex_box flex_justify-center flex_direction-column textAlignCenter addPadding">
    <div class="flex_justify-center textAlignCenter limit-size">
      <p>Log nu in voor gratis snoep!</p>
    </div>
    <form action="../../PHP/loginCheck.php" method="post">
        <input type="email" placeholder="Email adress" name="email" id="email" required class="maxWidth addPadding">
        <input type="password" placeholder="Wachtwoord" name="password" required class="maxWidth addPadding">
        <button type="submit" value="login">Login</button>
    </form>
</div>

<?php
  include '../Partials/footer.php';
?>