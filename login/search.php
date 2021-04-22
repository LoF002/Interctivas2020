<?php
    namespace Medoo;
    require "Medoo.php";

    session_start();
    
    function searchBy($keyword, $by){
        
        $database = new Medoo([
            "database_type" => "mysql",
            "database_name" => "books_catalog",
            "server" => "localhost",
            "username" => "root",
            "password" => "root"
        ]);

        return $results = $database->select("tb_books", [
            "[><]tb_book_author" => ["id_book_author" => "id_book_author"],
            "[><]tb_book_category" => ["id_book_category" => "id_book_category"],
            "[><]tb_book_publisher" => ["id_book_publisher" => "id_book_publisher"]
        ],[
            "id_book", "book_title", "book_category", "author_name", "author_lastname", "book_image", "publisher_name"
        ],[
            $by."[~]" => $keyword
        ]);
    }

    if(isset($_SESSION["isLoggedIn"])){
        if($_POST){

            $data = searchBy($_POST["keyword"], $_POST["search_by"]);
            
        }

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
    <title>Search books</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
    <div class="container">

    <form method="post" action="search.php">

        <div class="row">
            <div class="col col-2 margin-both">
                <label for="">Enter book title</label>
            </div>
            <div class="col col-2 margin-both">
                <input type="text" name="keyword">
            </div>
            <div class="col col-2 margin-both">
                <select class="menu" name="search_by">
                    <option value="book_title">Book title</option>
                    <option value="author_name">Book author</option>
                    <option value="publisher_name">Book publisher</option>
                    <option value="book_category">Book category</option>
                </select>
            </div>
            <div class="col col-2 margin-both">
                <input type="submit" value="SEARCH">
            </div>
        </div>
        
    </form>

    <?php
        if($_POST){
            echo "<h1>Results</h1>";
            echo "<h2>Found: ".count($data)."</h2>";
       
            $len = count($data);
            if($len > 0){

                echo "<div class='row'>";
                echo "<div class='col col-2 title-gallery'>Image</div>";
                echo "<div class='col col-2 title-gallery'>Book</div>";
                echo "<div class='col col-2 title-gallery'>Author</div>";
                echo "<div class='col col-2 title-gallery'>Category</div>";
                echo "<div class='col col-2 title-gallery'>Publisher</div>";
                echo "</div>";

                for($i=0; $i<$len; $i++){
                    echo "<div class='row'>";
                    echo "<div class='col col-2'><img class='img-gallery' src='./images/".$data[$i]["book_image"]."'></div>";
                    echo "<div class='col col-2'>".$data[$i]["book_title"]."</div>";
                    echo "<div class='col col-2'>".$data[$i]["author_name"]." ".$data[0]["author_lastname"]."</div>";
                    echo "<div class='col col-2'>".$data[$i]["book_category"]."</div>";
                    echo "<div class='col col-2'>".$data[$i]["book_category"]."</div>";
                    echo "</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>