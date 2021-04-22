<?php
    namespace Medoo;
    require "Medoo.php";

    session_start();
    if(isset($_SESSION["isLoggedIn"])){
    
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "books_catalog",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);

        $data = $database->select("tb_books", [
            "[><]tb_book_author" => ["id_book_author" => "id_book_author"],
            "[><]tb_book_category" => ["id_book_category" => "id_book_category"]
        ],[
            "id_book", "book_title", "book_category", "author_name", "author_lastname", "book_image"
        ]);

    }else{
        //redirect
        header("location:login.php");
    }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered books</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
    <div class="container">
        <h1>Registered books</h1>
        <h3>Hi <?php echo $_SESSION["usr"]; ?> <a href="logout.php">Logout</a></h3>
        <p><a href="search.php">Search a book</a></p>
        <div class="row">
            <div class="col col-2 title-gallery">Image</div>
            <div class="col col-2 title-gallery">Book</div>
            <div class="col col-2 title-gallery">Author</div>
            <div class="col col-2 title-gallery">Category</div>
            <div class="col col-2 title-gallery">Options</div>
        </div>
        <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo "<div class='row'>";
                echo "<div class='col col-2'><img class='img-gallery' src='./images/".$data[$i]["book_image"]."'></div>";
                echo "<div class='col col-2'>".$data[$i]["book_title"]."</div>";
                echo "<div class='col col-2'>".$data[$i]["author_name"]." ".$data[0]["author_lastname"]."</div>";
                echo "<div class='col col-2'>".$data[$i]["book_category"]."</div>";
                echo "<div class='col col-2'><a href='edit-book.php?idbook=".$data[$i]["id_book"]."'>Edit</a> <a href='delete-book.php?idbook=".$data[$i]["id_book"]."'>Delete</a></div>";
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>