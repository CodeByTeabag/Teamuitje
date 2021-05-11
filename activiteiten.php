<?php
include('db.php');
$page = 'activiteiten';
include('page-layout/header.php');
?>

<div class="jumbotron" alt="header_img">
    <div class="header-text">Activiteiten</div>
</div>
<main class="container">
    <div class="container col-12">
        <?php
        if (isset($_SESSION['achternaam'])) {
            $achternaam = $_SESSION['achternaam'];
        }
        ?>
        <h1>Activiteiten</h1>
        <hr>
        <?php
        $sql = "SELECT * FROM activiteiten";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        foreach ($result as $res) { ?>

            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $res['Pictures']; ?>" alt="array_images">
                </div>
                <div class="col-md-5">
                    <h3><?php echo $res['Naam']; ?></h3>
                    <small><?php echo $res['Begintijd'] . " - " . $res['Eindtijd']; ?></small>
                    <p class="text-justify"><?php echo $res['Omschrijving']; ?></p>
                    <h5>Aantal
                        <small><?php echo $res['Aantal']; ?></small>
                    </h5>
                    <h5>Locatie
                        <small><?php echo $res['Locatie']; ?></small>
                    </h5>
                    <h5>Datum
                        <small><?php echo $res['Deadline']; ?></small>
                    </h5>
                    <form action="inschrijven.php?id=<?php echo $res['id'] ?>" method="post">
                        <input class="btn btn-primary" name="submit" value="Inschrijven" type="submit">
                    </form>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>
    <script src="JS/anime.js"></script>
    <?php
    include('page-layout/footer.php');
    ?>