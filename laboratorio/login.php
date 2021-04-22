<?php
    namespace Medoo;
    require "Medoo.php";
    
    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "books_catalog",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    date_default_timezone_set("America/Costa_Rica");
    $date_time = date("Y-m-d H:i:s");

    if($_POST){
        $user=$database->select("tb_users", "*",["username[]"=>$_POST["username"],"password[]"=>$_POST["password"]]);
        if(empty($user)){
            echo"Usuario o Contrasena incorrecta";
        }
        else{
            if(!empty($user)){
                echo"ha iniciado sesion";
                if(!empty($database)){
                    $database->update("tb_users", [
                        "last_login_at" => $date_time
                    ],[
                        "username" => $_POST["username"]
                    ]);
                }
            }
        }
        header("location:list-books.php");   
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>User login</h1>
        <div class="row">
            <form action="login.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col col-2">
                        <label for="">Username</label>
                    </div>
                    <div class="col col-2">
                        <input type="text" name="username">
                    </div>
                </div>

                <div class="row">
                    <div class="col col-2">
                        <label for="">Password</label>
                    </div>
                    <div class="col col-2">
                        <input type="password" name="password">
                    </div>
                </div>

                <div class="row">
                    <div class="col col-4">
                        <input type="submit" value="LOG IN">
                    </div>
                    
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>