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

    $database->delete("tb_books", [
        "id_book" => $_GET["id"]
    ]);

    header("location:list.php");
?>