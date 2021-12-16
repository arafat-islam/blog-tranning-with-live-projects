<?php
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();


    if(isset($_POST['submit'])) {
        $id = $_GET['id'];
        $category_name = $_POST['category'];
        if(!empty($category_name)) {
            
            $query = "UPDATE category SET name = '$category_name' WHERE id = $id";
        
            $post = $db->update($query);
            header("location: catlist.php?edited='successfully'");
        } else {
            header("location: editcat.php?empty='empty'&id=$id");
        }

    }
   






?>