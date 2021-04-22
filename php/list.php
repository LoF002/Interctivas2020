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

    $data = $database->select("tb_books", "*");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registered books</h1>
    <table>
        <tr>
            <td>Title</td>
            <td>Author</td>
            <td>Category</td>
            <td>Actions</td>
        </tr>
        <?php
            $len = count($data);
            for($i=0; $i<$len; $i++){
                echo "<td>".$data[$i]["book_title"]."</td><td>".$data[$i]["book_author"]."</td><td>".$data[$i]["book_category"]."</td><td><a href='edit.php?id=".$data[$i]["id_book"]."'>Edit</a></td>";
            }
        ?>
    </table>
</body>
</html>