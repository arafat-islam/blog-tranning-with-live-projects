<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "DELETE FROM sliders WHERE id = $id";

    if($post = $db->delete($query) ) {
        header("location: sliders.php");
    }
   


?>