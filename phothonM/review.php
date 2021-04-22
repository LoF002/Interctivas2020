<?php
    namespace Medoo;
    require "Medoo.php";
    use \Datetime;

    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "phothon",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    date_default_timezone_set("America/Costa_Rica");
    $date_time = date("Y-m-d H:i:s");

    $data = $database->select("tb_photos", "*", ["status" => "Pending"],["image", "tittle"]);

    if($_POST){
        if($_POST["status"]=="Approve"){
            $database->update("tb_photos", [
                "status" => $_POST["status"]
            ],[
                "id_photo" => $_POST["id_photo"]
            ]);

            $database->update("tb_photos", [
                "submit" => $date_time
            ],[
                "id_photo" => $_POST["id_photo"]
            ]);
        }
        else{
            $database->delete("tb_photos", [
                "id_photo" => $_POST["id_photo"]
            ]);
        }
        header("location:review.php");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styleReview.css">
    <title>Review</title>
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
        <h1 class="tittle">Photo Review</h1>
        <ul class="row-photos">

        <form action="review.php" method="post">
            <?php
                $len = count($data);
                for($i=0; $i<$len; $i++){
                    echo"<li class='col'>";
                        echo"<div class='container-photo'>";
                            echo"<img class='photo' src='./db_img/".$data[$i]["image"]."'>";
                            echo"<p class='info'>".$data[$i]["tittle"]."</p>";
                            echo"<input type='hidden' name='id_photo' class='btn' value='".$data[$i]["id_photo"]."'>";
                        echo"</div>";
                    echo"</li>";
                }
                echo"<ul class='row-btn'>";
                    echo"<input type='submit' name='status' class='btn' value='Approve'>";
                    echo"<input type='submit' name='status' class='btn' value='Deny'>";
                echo"</ul>";
            ?>
        </form>

        

        </ul>
    </section>

    <script src="./js/main.js"></script>

</body>
</html>