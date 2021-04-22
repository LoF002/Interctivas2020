<?php
 namespace Medoo;
 require "Medoo.php";
 use \Datetime;

 $database = new Medoo([
     "database_type" => "mysql",
     "database_name" => "phothon",
     "server" => "localhost",
     "username" => "root",
     "password" => "root"
 ]);


 if(isset($_SERVER["CONTENT_TYPE"])){
 
    $contentType = $_SERVER["CONTENT_TYPE"];

        if ($contentType === "application/json") {

            $content = trim(file_get_contents("php://input"));

            $entrada = json_decode($content, true);
          
            $email = $database->select("tb_users", "*", ["email"=>$entrada["email"]]);
        
        if(count($email)>0){
       
      $database->update("tb_users", ["password"=>$entrada["pass"]],["email"=>$entrada["email"]]);
      
      echo json_encode($entrada["pass"]);

        }
        else{

            echo json_encode(400);
        }

        }//fin del if
}

?>