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
   
    if(isset($_SERVER["CONTENT_TYPE"])){

        $contentType = $_SERVER["CONTENT_TYPE"];

        if ($contentType === "application/json") {

            //https://www.php.net/manual/en/wrappers.php.php#wrappers.php.input
            $content = trim(file_get_contents("php://input"));
            /*
                Si se elimina true del final del json_decode, los datos se leen como un objeto PHP
                se accede al valor usando $input->key, con el valor de true se lee como un array
            */
            $decoded = json_decode($content, true);
            
            echo json_encode($decoded["username"]);
            //lectura como array = $decoded["username"] | $decoded["password"] | $decoded["user_email"]
            //lectura como objeto = $decoded->username | $decoded->password | $decoded->user_email

            /*
            $pass = password_hash(" ", PASSWORD_DEFAULT, ['cost' => 12]);
            $database->insert("tb_users", [
                "username" => ,
                "password" => $pass,
                "user_email" => ,
                "registered_at" => $date_time,
                "last_login_at" => ""
            ]);
            */

        }
    }
    
?>