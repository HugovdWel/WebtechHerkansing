<?php
    if (isset($_POST["logout"])){
        session_start();
        session_destroy();
    }

?>

<link rel="stylesheet" href="../../CSS/header.css">
<link rel="stylesheet" href="../../CSS/flex.css">

<div class="header standardStyle flex_box flex_justify-stretch textAlignCenter">
    <div class="flex_item logo header-item">
        
    </div>
    <div class="flex_item header-item">
        <h1>EendenVrienden.nl</h1>
    </div>
    <div class="flex_item header-item">
    <?php
        session_start();
        if(isset($_SESSION["User"])){
            echo'<form action="" method="post" class="navbar-style alternativeStyle flex_box flex_justify-center">';
                echo 'welkom '. $_SESSION["User"];
                echo '<input type="submit" name="logout" value="log uit">';
            echo'</form>';
        }
        else{
            echo('<a class="textColorLinks" href="../../HTML/pages/login.php">Log in</a> of <a class="textColorLinks" href="../../HTML/pages/register.php"> registreer!');
        }
    ?>
    </div>
</div>


