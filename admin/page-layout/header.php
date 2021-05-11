<?php
ob_start();
session_start();
if (isset($_SESSION['admin_id'])) {
    $admin = $_SESSION['admin_id'];
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

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <h3 id="admin">Admin Panel</h3>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
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

                    if (isset($_SESSION['admin_id']) == NULL) {
                        header('location: login.php');
                    } else if (isset($_SESSION['admin_id']) != NULL) {
                        echo 'active';
                    }
                } ?>">
                    <a class="nav-link" href="activiteiten.php">Activiteiten</a>
                </li>

                <li class="nav-item 
                <?php if ($page == 'personeel') {
                    if (isset($_SESSION['admin_id']) == NULL) {
                        header('location: login.php');
                    } else if (isset($_SESSION['admin_id']) != NULL) {
                        echo 'active';
                    }
                } ?>">
                    <a class="nav-link" href="personeel.php">Personeel</a>
                </li>

                <li class="nav-item 
                <?php if ($page == 'admin') {
                    if (isset($_SESSION['admin_id']) == NULL) {
                        header('location: login.php');
                    } else if (isset($_SESSION['admin_id']) != NULL) {
                        echo 'active';
                    }
                } ?>">
                    <a class="nav-link" href="admin.php">Admin User</a>
                </li>

                <li class="nav-item 
                <?php if ($page == 'inschrijvings_overzicht') {
                    if (isset($_SESSION['admin_id']) == NULL) {
                        header('location: login.php');
                    } else if (isset($_SESSION['admin_id']) != NULL) {
                        echo 'active';
                    }
                } ?>">
                    <a class="nav-link" href="inschrijvings_overzicht.php">Inschrijvingen</a>
                </li>

            </ul>
            <div class="row">
                <div class="col-md-3">
                    <input type="checkbox" class="checkbox" id="chk" />
                    <label class="label" for="chk">
                        <div class="ball"></div>
                    </label>
                </div>

                <?php
                // Print inloggen of uitloggen
                if (isset($_SESSION['admin_id'])) {
                    $admin1 = $_SESSION['admin_id'];
                }

                if (isset($admin1) == NULL) {
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

                if (isset($_SESSION['admin_id'])) {
                    $admin2 = $_SESSION['admin_id'];
                }

                if (isset($admin2) == NULL) {
                ?>
                    <style>
                        #toggleLogout {
                            display: none;
                        }
                    </style>
                <?php

                } else {
                ?>
                    <style>
                        #toggleLogout {
                            display: block;
                        }
                    </style>
                <?php
                }
                ?>


                <?php
                function verify()
                {
                    header('location: login.php');
                }
                ?>
                <div class="col-md-6">
                    <a href="login.php" class="nav-link" id="toggleLogin">Inloggen</a>
                    <a href="session.php" class="nav-link" id="toggleLogout">Uitloggen</a>
                </div>
            </div>
        </div>
    </nav>