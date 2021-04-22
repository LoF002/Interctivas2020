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

    if($_POST){
        $database->insert("tb_users", [
            "name" => $_POST["name"],
            "username" => $_POST["username"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "type" => "admin",
            "registered_at" => $date_time,
            "last_login_at" => ""
        ]);
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Registered</title>
    <link rel="stylesheet" href="./css/styleAdd-user.css">
</head>
<body>
    <div class="container">
        <a href="./index.php">
            <img src="./images/logo.png" alt="logo">  
        </a>
        <form action="add-user.php" method="post" class="input-group">
            <input type="text" name="name" class="input-field" placeholder="  Full name " required>
            <input type="text" name="username" class="input-field" placeholder="   Username" required>
            <input type="text" name="email" class="input-field" placeholder="    E-mail" required>
            <input type="text" name="password" class="input-field" placeholder="   Password" required>
            <input type="submit" class="submit-btn" value="Create account">
        </form>
    </div>
</body>
</html>