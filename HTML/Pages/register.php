<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php';
?>

<div class="flex_box flex_justify-center addPadding">
    <div class="alternativeStyle flex_box flex_justify-center textAlignCenter flex_direction-column limit-size">
    registreer nu in voor gratis snoep!
    </div>
    <Form action="../../PHP/registerCheck.php" method="post">
        <input type="text" placeholder="Gebruikersnaam" name="user-R" id="user-R" recuired> <br>
        <input type="email" placeholder="Email adress" name="email-R" id="email-R" required> <br>
        <input type="password" placeholder="Wachtwoord" name="password-R" required> <br>        
        <input type="password" placeholder="Herhaal wachtwoord" name="repeat-R" required> <br>
        <button type="submit" value="register">registreer</button> <br>
    </Form>
</div>

<?php
  include '../Partials/footer.php';
?>