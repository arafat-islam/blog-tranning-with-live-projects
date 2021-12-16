<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "DELETE FROM category WHERE id = $id";

    $post = $db->delete($query);

    header("location: catlist.php");
   


?>