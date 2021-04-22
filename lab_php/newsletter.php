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

        //verifica si es nula
    if(isset($_SERVER["CONTENT_TYPE"])){

        $contentType = $_SERVER["CONTENT_TYPE"];

        if ($contentType === "application/json") {

            $content = trim(file_get_contents("php://input"));
            
            $decoded = json_decode($content, true);//true define esto como un array

            //recoge de la base de datos todos los datos que esten relacionados al email   
                                                             //email de la tabla
            $data = $database -> select("tb_registrations","*",["email" => $decoded["email"]]);
            
            if(empty($data)){//si esta vacio es true
                echo json_encode(true);
            }
            else{
                echo json_encode(false);
            }

            //echo json_encode($decoded["email"]); //echo es para transmitir examen
        }
    }

?>