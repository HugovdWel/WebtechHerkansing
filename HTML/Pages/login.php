<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php';
?>
<div class="flex_box flex_justify-center addPadding">
    <div class="alternativeStyle flex_box flex_justify-center textAlignCenter flex_direction-column limit-size">
        Log nu in voor gratis snoep!
    </div>
    <Form action="../../PHP/login.php" method="post">
        <input type="email adress" placeholder="Email adress" name="email" required>
        <input type="password" placeholder="Wachtwoord" name="password" required>
        <button type="submit" value="login">Login</button>
    </Form>
</div>

<?php
  $start_SESSION;
  $email = $_POST['email']= "niet ingelogd";
  $_SESSION["email"] = "niet ingelogd";
  if ("login"){
      $_SESSION["email"] = $email;
  }
echo $email;

  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php';
?>