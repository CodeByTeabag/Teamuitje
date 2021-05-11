<?php
ob_start();
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else if (isset($_SESSION['voucher'])) {
    $voucher = $_SESSION['voucher'];
} else if (isset($_SESSION['voorletter'])) {
    $voorletter = $_SESSION['voorletter'];
} else if (isset($_SESSION['tussenvoegsel'])) {
    $tussenvoegsel = $_SESSION['tussenvoegsel'];
} else if (isset($_SESSION['achternaam'])) {
    $achternaam = $_SESSION['achternaam'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Het Anker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Teamuitje">
    <meta name="author" content="Davy de Bruin">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-static/">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link href="CSS/styles.css" rel="stylesheet">
</head>

<header>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark col-12 col-sm-12 ">
        <a href="home.php">
            <img id="anker_logo" src="images/hetanker_logo.png" alt="header_logo" width="70px" height="65px">
        </a>

    
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="navbar-toggler-icon"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item 
                <?php if ($page == 'home') {
                    echo 'active';
                } ?>">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item 
                <?php if ($page == 'activiteiten') {
                    echo 'active';
                } ?>">
                    <a class="nav-link" href="activiteiten.php">Activiteiten</a>
                </li>
                <li class="nav-item 
                <?php if ($page == 'contact') {
                    echo 'active';
                } ?>">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
            </ul>

             <div class="text-white list-unstyled padding font-size">Darkmode</div>
            <input type="checkbox" class="checkbox" id="chk" />
            <label class="label" for="chk">
                <div class="ball"></div>
            </label>

            <?php
            // Print login or logout button
            if (isset($_SESSION['achternaam'])) {
                $achternaam = $_SESSION['achternaam'];
            }

            if (isset($achternaam) == NULL) {
            ?>
                <style>
                    #toggleLogin {
                        display: block;
                    }
                </style>
            <?php
            } else {
            ?>
                <style>
                    #toggleLogin {
                        display: none;
                    }
                </style>
            <?php
            }

            if (isset($_SESSION['achternaam'])) {
                $achternaam = $_SESSION['achternaam'];
            }

            if (isset($achternaam) == NULL) {
            ?>
                <style>
                    #toggleUitloggen {
                        display: none;
                    }
                </style>
            <?php
            } else {
            ?>
                <style>
                    #toggleUitloggen {
                        display: block;
                    }
                </style>
                <?php $welcome = "Welkom terug, " ?>
            <?php
            }
            ?>
            <div class="text-white list-unstyled padding font-size"><?php echo $welcome . $_SESSION['voorletter'] . " " . $_SESSION['tussenvoegsel'] . " " . $_SESSION['achternaam'];  ?></div>
            <a href="login.php" class="nav-link" id="toggleLogin">Login</a>
            <a href="session.php" class="nav-link" id="toggleUitloggen">Uitloggen</a>
        </div>
    </nav>
</header>

<body>