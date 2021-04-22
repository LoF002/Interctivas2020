<?php
    namespace Medoo;
    require "Medoo.php";
    
    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "taller3",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);
    
    if(isset($_SERVER["CONTENT_TYPE"])){

        $contentType = $_SERVER["CONTENT_TYPE"];

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            $data = $database -> select("tb_registrations", "*", ["email" => $decoded["email"]]);

            if(empty($data)){
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }

        }//Fin if

    }//Fin if
    
    //$data = $database->select("tb_registrations", "*");
    //var_dump($data);
?>