<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php';
?>

<div class="flex_box flex_justify-center flex_direction-column textAlignCenter addPadding">
    <div class="flex_justify-center textAlignCenter limit-size">
      <p>registreer nu in voor gratis snoep!</p>
    </div>
    <form action="../../PHP/registerCheck.php" method="post" class="limit-size-40">
        <input type="text" placeholder="Gebruikersnaam" name="user-R" id="user-R" recuired class="maxWidth addPadding">
        <input type="email" placeholder="Email adress" name="email-R" id="email-R" required class="maxWidth addPadding">
        <input type="password" placeholder="Wachtwoord" name="password-R" required class="maxWidth addPadding">     
        <input type="password" placeholder="Herhaal wachtwoord" name="repeat-R" required class="maxWidth addPadding">
        <button type="submit" value="register">registreer</button>
    </form>
</div>

<?php
  include '../Partials/footer.php';
?>