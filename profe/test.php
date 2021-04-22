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

    $data = $database->select("tb_countries", "*");

    //print_r($data);

    echo $data[0]["country_name"];


?>