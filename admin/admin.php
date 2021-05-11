<?php
require_once('db.php');
$page = 'admin';
require_once('page-layout/header.php');
?>

<?php
$sql = "SELECT * FROM login_admin";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="container padding">
    <a class="btn btn-primary">Create</a>
    <?php
    foreach ($result as $res) {
    ?>
        <div class="container padding">
            <div class="row">
                <div class="col-md-12">
                    <h3><?php echo "Gebruikersnaam:" . "<br> <small>" . $res['gebruikersnaam']; ?></small></h3>
                    <h3><?php echo "Wachtwoord:" . "<br> <small>" . $res['wachtwoord']; ?></small></h3>
                    <a class="btn btn-primary" id="editButton" href="index.php?page=USER-update&id=<?php echo $res['id']; ?>">Edit</a>
                    <a class="btn btn-primary" id="deleteButton" href="index.php?page=USER-delete&id=<?php echo $res['id']; ?>">Delete</a>
                </div>
            </div>
        </div>
        <hr>
</div>
<?php }
    include('page-layout/footer.php');
?>