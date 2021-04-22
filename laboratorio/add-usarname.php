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
        $user=$database->select("tb_users", "*",["username[]"=>$_POST["username"]]);
        $email=$database->select("tb_users", "*",["user_email[]"=>$_POST["email"]]);
        if(empty($user)and empty($email)){
        $database->insert("tb_users", [
            "username" => $_POST["username"],
            "password" => $_POST["password"],
            "user_email" => $_POST["email"],
            "registered_at" => $date_time
        ]);

        header("location:login.php");
        }

        else{
            if(!empty($user)){
                echo"Este usuario ya está utilizado, ingrese otro.";
            }
            if(!empty($email)){
                echo"El correo ya está vinculado a otro cuenta, ingresar otro.";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new user</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <h1>Add new user</h1>
        <div class="row">
            <form action="add-usarname.php" method="post" enctype="multipart/form-data">
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
                        <input type="text" name="password">
                    </div>
                </div>

                <div class="row">
                    <div class="col col-2">
                        <label for="">Email address</label>
                    </div>
                    <div class="col col-2">
                        <input type="text" name="email">
                    </div>
                </div>

                <div class="row">
                    <div class="col col-4">
                        <input type="submit" value="Add new user">
                    </div>
                    
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>