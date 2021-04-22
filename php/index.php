<?php

    //comentario
    /* comentario
    */
error_reporting(E_ALL);
ini_set('display_errors', 1);

    $name = "PHP";
    $status = true;
    $qty = 20;

    //echo "value -> ".$name;
    // ==, >=, <=, ||, &&, !

    function compare($num1, $num2, $num3){
        
        if($num1 > $num2 && $num1 > $num3){
            echo "Number: ".$num1;
        }else if($num2 > $num3){
            echo "Number: ".$num2;
        }else{
            echo "Number: ".$num3;
        }

    }

    function createList(){

        for($i=0; $i<5; $i++){
            echo "<li>item ".$i."</li>";
        }

    }

    //compare(5,30,4);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .textfield{
            padding: .5em;
            font: Arial;
        }
        .btn-send{
            padding: .5em;
            color: #fff;
            background: #000;
        }
    </style>
</head>
<body>
    <ul>
        <?php
            createList();
        ?>
    </ul>
    <p><?php echo md5("pwd123"); ?></p>
    <form action="response.php" method="post">
        <label for="">User</label>
        <input class="textfield" type="text" name="user">
        <label for="">Password</label>
        <input class="textfield" type="text" name="password">
        <input class="btn-send" type="submit" value="SEND">
    </form>
</body>
</html>