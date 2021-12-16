<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "UPDATE contact SET delete_status = 0 WHERE id = $id";


   if ($db->update($query)) {
       header("location: inbox.php");
   }


?>