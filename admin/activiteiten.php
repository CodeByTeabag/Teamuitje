<?php
include('db.php');
$page = 'activiteiten';
include('page-layout/header.php');
?>

<div class="jumbotron" alt="header_img">
    <div class="header-text">Activiteiten</div>
</div>
<main class="container">
    <div class="container">
        <h1 class="my-4">Activiteiten
            <a class="btn btn-primary" id="createButton" href="index.php?page=CRUD-create">Create</a>
        </h1>
        <hr>
        <?php
        $sql = "SELECT * FROM activiteiten";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $res) {
        ?>
            <div class="row">
                <div class="col-md-7">
                    <img class="img-fluid rounded mb-3 mb-md-0" src="<?php echo $res['Pictures']; ?>" alt="array_images">
                </div>
                <div class="col-md-5">
                    <h3><?php echo $res['Naam']; ?></h3>
                    <small><?php echo $res['Begintijd'] . " - " . $res['Eindtijd']; ?></small>
                    <p><?php echo substr($res['Omschrijving'], 0, 263) . "..."; ?></p>
                    <h5>Aantal
                        <small><?php echo $res['Aantal']; ?></small>
                    </h5>
                    <h5>Locatie
                        <small><?php echo $res['Locatie']; ?></small>
                    </h5>
                    <h5>Deadline
                        <small><?php echo $res['Deadline']; ?></small>
                    </h5>
                    <a class="btn btn-primary" id="editButton" href="index.php?page=CRUD-update&id=<?php echo $res['id']; ?>">Edit</a>
                    <a class="btn btn-primary" id="deleteButton" href="index.php?page=CRUD-delete&id=<?php echo $res['id']; ?>">Delete</a>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>

</html>
<script src="JS/anime.js"></script>
<?php
include('page-layout/footer.php');
?>