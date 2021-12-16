<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "UPDATE contact SET read_status = 0 WHERE id = $id";

    $post = $db->update($query);
   if($post) {
       header("location: inbox.php");
   }


?>