<?php 
    include '../Partials/head.php'; 
    include '../Partials/header.php'; 
    include '../Partials/navbar.php'; 
?>
<link rel="stylesheet" href="../../CSS/videos.css">
<link rel="stylesheet" href="../../CSS/forum.css">

<?php 
    include '../../PHP/databaseConnection.php';
    if(isset($_GET["videoCatagory"])){
        if($_GET["videoCatagory"] == "alles"){
            unset($_GET);
        }
    }
    if(!isset($_GET["videoCatagory"])){
        $videos = getVideos(NULL, 20);
        $category = 'alles';
    } else{
        $videos = getVideos($_GET["videoCatagory"], 20);
        $category = $_GET["videoCatagory"];
    }

    echo'<h3 class="textAlignCenter breakWord"> Eenden video\'s </h3>';

    echo'<div class="navbar-style alternativeStyle flex_box flex_justify-center">';

        echo'<form action="" method="get" class="flex_item addPadding navbar-item-style">';
            echo'<input type="submit" name="videoCatagory" value="alles" class="navbar buttonStyle">';
            echo'<input type="submit" name="videoCatagory" value="cute" class="navbar buttonStyle">';
            echo'<input type="submit" name="videoCatagory" value="eendenObserveren" class="navbar buttonStyle">';
            echo'<input type="submit" name="videoCatagory" value="voortplantingsgedrag" class="navbar buttonStyle">';
            echo'<input type="submit" name="videoCatagory" value="mensenEnEenden" class="navbar buttonStyle">';
        echo'</form>';

    echo'</div>';

    echo'<h3 class="textAlignCenter breakWord"> Categorie: '. $category . ' </h3>';
    
    echo'<div class="flex_box flex_justify-center flex_direction-column">';
        echo'<div class="flex_justify-center standardStyle flex_box forumContainer">';

            foreach($videos as $video){
                echo'<div class="forumPostListing flex_justify-center breakWord flex_box">';
                    echo'<h4 class="maxWidth textAlignCenter">' . $video["name"] . '</h4>';
                    echo'<iframe src="' . $video["link"] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    echo '<p class="maxWidth textAlignCenter addPadding">' . $video["description"] . '</p>';
                echo'</div>';
            }
        echo'</div>';
    echo'</div>';


    include '../Partials/footer.php'; 
    include '../Partials/pageEnd.php'; 
?> 