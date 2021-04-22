<?php

    namespace Medoo;
    require "Medoo.php";

    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "phothon",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    $data = $database->select("tb_photos", "*", ["status" => "Approve"],["image", "tittle"]);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styleVoted.css">
    <title>Voted</title>
</head>
<body>
    
    <header>
        <nav class="top-bar">
            <a href="./index.php">
                <img class="logo" src="./images/logo.png" alt="logo">
            </a>
            <span class="mob-menu fas fa-bars" onclick="openMobileMenu()"></span>
            <ul class="top-nav">
                <span class="mob-close far fa-times-circle" onclick="closeMobileMenu()"></span>
                <li class="top-nav-item"><a class="top-nav-link" href="./index.php">Home</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="./galery.php">Gallery</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="#">Contact</a></li>

                <li class="top-nav-item">
                    <div class="search-item">
                        <input class="input-search" type="text" placeholder="Search">
                        <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <section class="intro-section">
        <h1 class="tittle">Most voted photographs</h1>
        <ul class="row-photos">

            <?php
                $len = count($data);
                for($i=0; $i<$len; $i++){
                    echo"<li class='col'>";
                        echo"<div class='container-photo'>";
                            echo"<img class='photo' src='./db_img/".$data[$i]["image"]."'>";
                            echo"<p class='info'>".$data[$i]["tittle"]."</p>";
                        echo"</div>";
                    echo"</li>";
                }
                echo"<ul class='row-btn'>";
                echo"<input type='submit' name='status' class='btn' value='Like'>";
                echo"<input type='submit' name='status' class='btn' value='Ignore'>";
                echo"</ul>";
            ?>

        </ul>
    </section>

    <script src="./js/main.js"></script>

</body>
</html>