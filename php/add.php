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

    if($_POST){
        $database->insert("tb_books", [
            "book_title" => $_POST["title"],
            "book_author" => $_POST["author"],
            "book_category" => $_POST["category"]
        ]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add - Book</title>
</head>
<body>
    <h1>Add new book</h1>

    <form action="add.php" method="post">
        <label for="">Book title</label>
        <input type="text" name="title">

        <label for="">Author</label>
        <input type="text" name="author">

        <label for="">Category</label>
        <input type="text" name="category">

         <input type="submit" value="ADD NEW BOOK">
    </form>
</body>
</html>
