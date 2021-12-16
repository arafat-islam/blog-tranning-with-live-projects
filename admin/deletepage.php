<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "DELETE FROM pages WHERE id = $id";
   
    $post = $db->delete($query);

    header("location: index.php");
   


?>