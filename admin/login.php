<?php
require_once('db.php');
include('page-layout/header.php');
$admin = "admin";
$wachtwoord = "teamuitje123";

$error = [];
if (isset($_POST['submit'])) {
   if ($_POST['gebruikersnaam'] !== $admin) {
      $error['gebruikersnaam'] = "Gebruikersnaam komt niet overeen!";
   }
   if ($_POST['wachtwoord'] !== $wachtwoord) {
      $error['wachtwoord'] = "Wachtwoord komt niet overeen!";
   }

   if (count($error) == 0) {
      $sql = "SELECT * FROM login_admin WHERE gebruikersnaam = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$_POST['gebruikersnaam']]);
      $result = $stmt->fetchAll();
      $hash = $result[0]['wachtwoord'];
      if (password_verify($_POST['wachtwoord'], $hash)) {
         $_SESSION['admin_id'] = $result[0]['id'];
         header('location: index.php?page=activiteiten');
      } else {
         header('location: login.php');
      }
   }
}
?>

<div class="login-bg">
   <div class="container contact-box">
      <form id="login-form login-box " class="form col-md-6" onsubmit="return errorValidate()" method="post">
         <h3 class="text-center text-info">Login voor Admin Panel</h3>

         <div class="form-group">
            <h5 class="text-info">Gebruikersnaam</h5>
            <input type="text" name="gebruikersnaam" class="form-control" id="userInput">
            <?php
            if (isset($_POST['gebruikersnaam'])) { ?>
               <h6 class="errorMessage"><?php echo $error['gebruikersnaam']; ?></h6>
            <?php
            }
            ?>
            <h6 class="errorMessage" id="username"></h6>
         </div>

         <div class="form-group">
            <h5 class="text-info">Wachtwoord</h5>
            <input type="password" name="wachtwoord" class="form-control" id="passInput">
            <?php
            if (isset($_POST['wachtwoord'])) { ?>
               <h6 class="errorMessage"><?php echo $error['wachtwoord']; ?></h6>
            <?php
            }
            ?>
            <h6 class="errorMessage" id="passwordError"></h6>
         </div>

         <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn btn-info btn-md">
            <a href="../login.php">
               <input type="button" value="User" class="btn btn-info btn-md">
            </a>
         </div>

      </form>
   </div>
</div>
<script src="JS/loginAdmin.js"></script>
<?php
include('page-layout/footer.php');
?>