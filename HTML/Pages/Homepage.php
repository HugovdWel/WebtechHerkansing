<?php
    include '../Partials/head.php';
    include '../Partials/header.php';
    include '../Partials/navbar.php';
?>
<link rel="stylesheet" href="../../CSS/home.css">

<div class ="flex_box flex_justify-center textAlignCenter">
    <section class="flex_item">

        <h2>Waarom deze webpagina bestaat</h2>
        <p>Deze pagina bestaat om u alle mensen die van de onze gevleugelde vrienden houden bij elkaar te brengen.</p>
        <p>Het maakt niet uit of je wachelt, zwemt of dat je vliegt iedereen is welkom. </p>
    </section>

    <div class="flex_box flex_justify-center flex_direction-column addPadding forumPostListing breakWord standardStyle flex_box forumContainer"><h2>De soorten eenden</h2>Als je graag mee wil praten over eenden met onze eenden vrienden heb je hier wat standaard feitjes over eenden, zodat je klinkt alsof je interresant bent. Eend is de algemene naam voor een aantal soorten vogels uit de familie van eendachtigen (Anatidae). Alle soorten uit de Anatidae worden "eenden" genoemd, behalve de soorten uit de onderfamilie Anserinae, de ganzen en zwanen. Eenden zijn hoofdzakelijk aquatische vogels, meestal kleiner dan hun verwanten, de zwanen en de ganzen, met een kortere nek, en kunnen in zowel zoet als zout water worden gevonden. De Tadorninae, waartoe onder andere de bergeend behoort, houden qua formaat het midden tussen een gans en een eend.
        Eenden worden soms verward met verscheidene soorten niet verwante vogels met gelijkaardige vormen, zoals duikers, futen, rallen, koeten en waterhoentjes. Soms wordt met "eend" alleen vrouwtjeseenden bedoeld. Een mannetjeseend heet een "woerd". Een jonge eend wordt pijltje (soms piel) genoemd. In het algemeen worden jongen van kippen en eenden ook wel "pulletje" of "pulleke" genoemd. Een woerd van de wilde eend, de meest voorkomende soort, is naast de kleur ook te herkennen aan enkele gekrulde veren op de staart (dit is niet altijd zichtbaar).
    </div>
</div>
<div class="eend_image"> </div>
<div class="flex_box flex_justify-center">
    <div class="flex_box flex_justify-center addPadding forumPostListing breakWord standardStyle flex_box forumContainer maxWidth40Percent"><h2>Eend van de week</h2>De wilde eend is een algemeen voorkomende watervogel, die veel te vinden is in parken en vijvers. Het mannetje, de woerd, is te herkennen aan de opvallende groene kop en witte nekband. Ook heeft hij als enige eendensoort gekrulde staartveren. Het vrouwtje heeft een meer gecamoufleerd vooral bruin verenkleed. Gedurende de winter worden koppeltjes gevormd, waarbij het er soms heftig aan toe gaat; niet zelden proberen de vogels elkaar te verdrinken om zo rivalen te elimineren. Veel eenden in parken zijn mengvormen van wilde eenden met allerlei gedomesticeerde eenden.        </div>
    <div class="flex_box flex_justify-center addPadding forumPostListing breakWord standardStyle flex_box forumContainer maxWidth40Percent"><h2>De wilde eend</h2>an heeft in prachtkleed een groene kop, witte nekband en donkerbruine borst. Stuit en middelste gekrulde staartveren zijn zwart. Het vrouwtje is onopvallender bruin. De donkerblauwe "spiegel" met witte rand op de vleugel is een gedeelde eigenschap en een goed kenmerk om vrouwtje te onderscheiden van de gelijkende krakeend die een witte spiegel heeft. Na het broedseizoen lijkt de man meer op het vrouwtje. Aan de kleur van de snavel zijn ze dan nog te onderscheiden; zeemkleurig bij de vrouw, die van de man geel. Wilde eenden hebben oranje poten.</div>
</div>
<?php
    include '../../PHP/videoDatabaseFunctions.php';
    $videos = getVideos(NULL, 5);
    echo'<div class="flex_box flex_justify-center flex_direction-row">';
        foreach($videos as $video){
            echo'<div class="flex_justify-center standardStyle flex_box forumContainer flex_box flex_direction-row max-width">';
                echo'<div class="forumPostListing breakWord">';
                    echo'<h4 class="maxWidth textAlignCenter">' . $video["name"] . '</h4>';
                    echo'<iframe class="maxWidth" src="' . $video["link"] . '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    echo '<p class="maxWidth textAlignCenter addPadding">' . $video["description"] . '</p>';
                echo'</div>';
            echo'</div>';
        }
    echo'</div>';



    include '../Partials/footer.php';
?>