<?php
$page = 'home';
include('page-layout/header.php');
?>

<div class="jumbotron" alt="header_img">
    <div class="header-text">Het Anker</div>
</div>
<main class="container">
    <div class="marketing">
        <hr class="featurette-divider">

        <div class="row">
            <div class="col-md-7">
                <h2 class="featurette-heading">BEDRIJFSUITJE</h2>
                <p class="text-justify">De personeelsvereniging van Scholengemeenschap “Het Anker” organiseert binnenkort een bedrijfsuitje voor het gehele personeel. Het gaat om 151 mensen, verspreid over 3 locaties en het betreft zowel onderwijzend personeel als ondersteunend personeel. Het uitje is gepland vanaf 1 juni 2021 en de personeelsvereniging heeft haar best gedaan om een aantal leuke activiteiten te regelen.</p>
            </div>
            <div class="col-md-5">
                <img class="featurette-image img-fluid mx-auto" src="images/bedrijfsuitje.png" alt="bedrijfsuitje">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h2 class="featurette-heading">CORONA MAATREGELEN</h2>
                <p class="text-justify">De Nederlandse corona-aanpak is erop gericht om het virus maximaal onder controle te houden, de zorg niet te overbelasten en de kwetsbare mensen in de samenleving te beschermen. Inmiddels zijn er sinds maart goede resultaten bereikt. Omdat wij ons aan de maatregelen hebben gehouden, laten de cijfers een positieve ontwikkeling zien. Nu is het de zaak dat wij in controle blijven, totdat wij over een vaccin of behandeling beschikken. Daarom gaan wij stap voor stap te werk!.</p>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" src="images/corona_maatregelen.png" alt="corona_maatregelen">
            </div>
        </div>
        <hr class="featurette-divider">

    </div>
    <script src="JS/anime.js"></script>
    <?php
    require_once('page-layout/footer.php');
    ?>