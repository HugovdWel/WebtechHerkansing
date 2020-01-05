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
            echo($_SESSION["User"]); 
        }
        else{
            echo('<a href="">Log in of registreer!');
        }
    ?>
    </div>
</div>


