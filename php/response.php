<?php

    $user = "php";
    $pass = "pwd123";
    $status = false;

    if( $_POST["user"] == $user && $_POST["password"] == $pass){
        $status = false;
    }else{
        $status = true;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{
            width: 100%;
            padding: 1em;
            background: red;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Response</h1>
    
    <?php
        if($status){
            echo "<div class='error'><h3>Wrong username or password</h3></div>";
        }
    ?>
    
   
</body>
</html>