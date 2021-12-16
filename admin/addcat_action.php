<?php
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();


    if(isset($_POST['submit'])) {
        $category_name = $_POST['category'];

        if(!empty($category_name)) {
            $query = "INSERT INTO category (name) VALUES ('$category_name')";

            $db->insert($query);
            header("location: catlist.php?inserted='successfully'");
        } else {
            header("location: addcat.php?emtpy='empty'");
        }

    }
   






?>