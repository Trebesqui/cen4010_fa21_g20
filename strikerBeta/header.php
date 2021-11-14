<?php
include('include/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Striker</title>
        
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        
        <!-- My CSS -->
        <link href="css/mycss.css" rel="stylesheet" />
        
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php"><img src="assets/striker-logo.png" width="100" alt="striker logo" /></a>
                    <form action="search.php" method="GET" class="form-container">
                        <input type="text" name="q" class="mySearch" placeholder="Search for publications" required>
                        <input type="submit" class="mySearchbtn" value="Search">
                    </form>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                            <li class="nav-item">
                                <?php
                                    if (isset($_SESSION['username'])) {
                                        echo "<li class='nav-item'>";
                                        echo "<a href='admin.php' class='nav-link'>Profile</a>";
                                        echo "</li>";
                                        echo "<a href='logout.php' class='nav-link'>Logout</a>";
                                    } else {
                                        echo "<a href='login.php' class='nav-link'>Login</a>";
                                    }?>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </nav>