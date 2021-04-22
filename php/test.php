<?php

    namespace Medoo;
    require "Medoo.php";

    $database = new Medoo([
        "database_type" => "mysql",
        "database_name" => "catalog",
        "server" => "localhost",
        "username" => "root",
        "password" => "root"
    ]);

    $data = $database->select("tb_countries", "*");

    var_dump($data);

?>