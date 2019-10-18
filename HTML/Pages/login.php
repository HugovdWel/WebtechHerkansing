<?php 
  include '../Partials/head.php'; 
  include '../Partials/header.php'; 
  include '../Partials/navbar.php';
  session_start();
?>
<div class="flex_box flex_justify-center addPadding">
    <div class="alternativeStyle flex_box flex_justify-center textAlignCenter flex_direction-column limit-size">
        Log nu in voor gratis snoep!
    </div>
    <Form action="../../PHP/login.php" method="post">
        <input type="email adress" placeholder="Email adress" name="email" required>
        <input type="password" placeholder="Wachtwoord" name="password" required>
        <button type="submit">Login</button>
    </Form>
</div>

<?php 
  include '../Partials/footer.php'; 
  include '../Partials/pageEnd.php';
?>