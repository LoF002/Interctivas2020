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

    $data = $database->select("tb_books", [
        "[><]tb_book_author" => ["id_book_author" => "id_book_author"],
        "[><]tb_book_category" => ["id_book_category" => "id_book_category"],
        "[><]tb_book_publisher" => ["id_book_publisher" => "id_book_publisher"]
    ],[
        "id_book", "book_title", "book_category", "author_name", "author_lastname", "book_image", "publisher_name"
    ]);
    
    echo json_encode($data);

    //https://chrome.google.com/webstore/detail/jsonview/chklaanhfefbnpoihckbnefhakgolnmc?hl=es
    //https://addons.mozilla.org/es/firefox/addon/jsonview/
   
?>