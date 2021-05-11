<?php
require_once('db.php');
$page = 'personeel';
require_once('page-layout/header.php');
?>

<?php
$sql = "SELECT * FROM personeelgegevens";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="container padding-personeel">

    <div class="row col-md-12">
        <a class="btn btn-primary" id="createButton" href="index.php?page=PERSOON-create">Create</a>
        <div class="col-md-6">
            <?php
            ?>
            <h3><?php echo "Totaal personeel: " . count($result); ?></h3>
            <?php
            ?>
        </div>
    </div>
    <hr>
</div>
<?php
foreach ($result as $res) {
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3><?php echo "Personeelsnummer:" . " " . $res['Personeelsnummer']; ?></h3>
                <h3><?php echo "Naam:" . " " . $res['Voorletters'] . " " . $res['Tussenvoegsel'] . " " . $res['Achternaam']; ?></h3>
                <h3><?php echo "Email:" . " " . $res['Email']; ?></h3>
                <h3><?php echo "Voucher:" . " " . $res['Voucher']; ?></h3>
                <a class="btn btn-primary" id="editButton" href="index.php?page=PERSOON-update&Personeelsnummer=<?php echo $res['Personeelsnummer']; ?>">Edit</a>
                <a class="btn btn-primary" id="deleteButton" href="index.php?page=PERSOON-delete&Personeelsnummer=<?php echo $res['Personeelsnummer']; ?>">Delete</a>
            </div>
        </div>
        <hr>
    </div>
<?php }
include('page-layout/footer.php');
?>