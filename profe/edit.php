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

    $registered_data = $database->select("tb_books", [
        "id_book", "book_title", "book_author", "book_category"
    ],[
        "id_book" => $_GET["id"]
    ]);

    if($_POST){
        
        $database->update("tb_books", [
            "book_title" => $_POST["title"],
            "book_author" => $_POST["author"],
            "book_category" => $_POST["category"]
        ],[
            "id_book" => $_POST["id"]
        ]);

        header("location:list.php");
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Book</title>
</head>
<body>
    <h1>Update book</h1>
    
    <form action="edit.php" method="post">
        <label for="">Book name</label>
        <input type="text" name="title" value="<?php echo $registered_data[0]["book_title"]; ?>">
        <label for="">Author</label>
        <input type="text" name="author" value="<?php echo $registered_data[0]["book_author"]; ?>">
        <label for="">Category</label>
        <input type="text" name="category" value="<?php echo $registered_data[0]["book_category"]; ?>">
        <input type="hidden" name="id" value="<?php echo $registered_data[0]["id_book"]; ?>">
        <input type="submit" value="UPDATE BOOK">
    </form>
</body>
</html>