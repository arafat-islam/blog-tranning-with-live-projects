<?php
  include "../config/config.php";
  include "../lib/Database.php";

  $db = new Database();


    $id = $_GET['id'];

    $query = "DELETE FROM contact WHERE id = $id";


   if ($db->delete($query)) {
 
       header("location: inbox.php");
   }


?>