<?php
   namespace Medoo;
   require "Medoo.php";

   use \Datetime;
   
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
        
        $user = $database->select("tb_users", "*",["username" => $_POST["username"],"password"=>$_POST["password"]]);

        if(count($user) > 0){
            if(password_verify($_POST["password"], $user[0]["password"])){
                
                $database->update("tb_users", [
                    "last_login_at" => $date_time
                ],[
                    "id_user" => $user[0]["id_user"]
                ]);

                //iniciar sesion
                session_start();
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["usr"] = $user[0]["username"];
                //
                
                header("location: list-books.php");
                
            }else{
                echo "wrong username or password";
            }
        }else{
            echo "wrong username or password";
        }
        
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
            <form action="login.php" method="post">
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