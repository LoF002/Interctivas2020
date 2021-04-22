<?php
    namespace Medoo;
    require "Medoo.php";
    use \Datetime;

    session_start();
    if(isset($_SESSION["isLoggedIn"])){
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "phothon",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);
    
        date_default_timezone_set("America/Costa_Rica");
        $date_time = date("Y-m-d H:i:s");

        if(isset($_FILES["image"])){

            $errors = array();
            $file_name = $_FILES["image"]["name"];
            $file_size = $_FILES["image"]["size"];
            $file_tmp = $_FILES["image"]["tmp_name"];
            $file_type = $_FILES["image"]["type"];
            $file_ext_arr = explode(".", $_FILES["image"]["name"]);
    
            $file_ext = end($file_ext_arr);
            $img_ext = array("jpeg", "jpg", "png");
    
            if(in_array($file_ext, $img_ext) === false) $errors[] = "Choose a JPEG or PNG file";
            if($file_size > 2097152) $errors[] = "2MB Max";
    
            if(empty($errors)){
                $img = generateRandomString().".".pathinfo($file_name, PATHINFO_EXTENSION);
                move_uploaded_file($file_tmp, "./db_img/".$img);
            }//Fin if
            else{
                print_r($errors);
            }//Fin else

            if($_POST){
                $database->insert("tb_photos", [
                    "tittle" => $_POST["tittle"],
                    "description" => $_POST["description"],
                    "category" => $_POST["category"],
                    "image" => $img,
                    "id_user" => $_SESSION["id"],
                    "status" => "Pending",
                    "submit_at" => $date_time,
                    "approved_at" => ""
                ]);
                header("location:profile.php");
            }//Fin if
        }//Fin if
    }//Fin if

    function generateRandomString(){
        $string = str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQESTUVWXYZ");
        return substr($string, 20);
    }//Fin funtion

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>document </title>
    <link rel="stylesheet" href="./css/styleForm.css">
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
                <li class="top-nav-item"><a class="top-nav-link" href="./profile.php"><?php if(isset($_SESSION["isLoggedIn"])){echo $_SESSION["usr"];}?></a></li>

                <li class="top-nav-item">
                    <div class="search-item">
                        <input class="input-search" type="text" placeholder="Search">
                        <a class="icon-search" href="#"><i class="fas fa-search"></i></a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <section class="form-section">
    <h1>Form</h1>
    <h2>to participate in the photographic marathon.</h2>
        
    <div class="container">

        <form action="form.php" method="post" enctype="multipart/form-data" class="input-group">

            <ul class="row">
                <li class="col">
                    <input type="text" name="tittle" class="input-field" placeholder="  Tittle Photo" required>

                    <textarea name="description" class="input-field" placeholder="  Description" required></textarea>

                    <select name="category" class="input-field" require>
                        <option value="option_0">Category</option>
                        <option value="aerea">Aerea</option>
                        <option value="people">People</option>
                        <option value="nature">Nature</option>
                        <option value="landscape">Landscape</option>
                    </select>
                </li>
                <li class="col">
                    <input type="file" id="upload" name="image" class="up-img" accept="image/png, image/jpeg" require>
                    <img id="preview" src="" alt="">
                </li>
            </ul>
            <ul class="row">
                    <input type="submit" class="submit-btn" value="Send Form">
            </ul>
    
        </form>

    </div>
    </section>

    <script src="./js/main.js"></script>

</body>
</html>