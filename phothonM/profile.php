<?php

    namespace Medoo;
    require "Medoo.php";

    session_start();
    if(isset($_SESSION["isLoggedIn"])){

        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "phothon",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);
        
        $data = $database->select("tb_photos", "*", [
            "id_user" => $_SESSION["id"]
            
        ],[
            "image", "tittle", "status", "category"
        ]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Profile</title>
    <link rel="stylesheet" href="./css/styleProfile.css">
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
                <li class="top-nav-item"><a class="top-nav-link" href="./form.php">Form</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="./voted.php">Voted</a></li>
                <li class="top-nav-item"><a class="top-nav-link" href="logout.php">Logout</a></li>

                <li class="top-nav-item">
                    <div class="search-item">
                        <input class="input-search" type="text" placeholder="Search">
                        <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <section class="profile-section">

        <div class="container">
            <ul class="row-info">
                <li class="col-info"><img class="photo-profile" src="./images/perfil.webp" alt="photo"></li>
                <li class="col-info"><h1 class="tittle">Profile</h1><p><?php echo $_SESSION["usr"]; ?></p></li>
            </ul>

            <ul class="row-photos">

                <?php
                    $len = count($data);
                    for($i=0; $i<$len; $i++){
                        echo"<li class='col'>
                                <div class='container-photo'>";
                                    echo"<p class='info'>".$data[$i]["tittle"]."</p>";
                                    echo"<img class='photo' src='./db_img/".$data[$i]["image"]."'>";
                                    echo"<p class='info'>Status: ".$data[$i]["status"]."</p>";
                                    echo"<p class='info'>Category: ".$data[$i]["category"]."</p>";
                            echo"</div>";
                        echo"</li>";
                    }
                ?>
                
            </ul>
        </div>
    
    </section>
           
    <script src="./js/main.js"></script>

</body>
</html>