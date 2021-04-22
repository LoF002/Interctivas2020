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
        $user = $database->select("tb_users", "*", ["username"=>$_POST["username"], "password"=>$_POST["password"]]);
        if(empty($user)){
            echo "Wrong username or password";
        }//Fin if
        else{
            if(!empty($user)){
                if(!empty($database)){
                    $database->update("tb_users", [
                        "last_login_at" => $date_time
                    ],[
                        "username" => $_POST["username"]
                    ]);
                    session_start();
                    $_SESSION["isLoggedIn"] = true;
                    $_SESSION["usr"] = $user[0]["username"];
                    $_SESSION["id"] = $user[0]["id_user"];
                    header("location:profile.php");
                }//Fin if
            }//Fin if
        }//Fin else
    }//Fin if

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <title>Login</title>
    <link rel="stylesheet" href="./css/styleLogin.css">
</head>
<body>
    <div class="container">
        <a href="./index.php">
            <img src="./images/logo.png" alt="logo" >  
        </a>
        <form action="login.php" method="post" class="input-group">
            <input type="text" name="username" class="input-field" placeholder="    Username" required>
            <input type="password" name="password" class="input-field" placeholder="    Password" required>
            <input type="checkbox" class=""> <span>Remember my password</span>
            <input type="submit" class="submit-btn" value="Login">
            <a href="./recovery.php">Recover password</a><br>
            <a href="./add-user.php">Don't have an account? Register now.</a>
        </form>

    </div>
</body>
</html>