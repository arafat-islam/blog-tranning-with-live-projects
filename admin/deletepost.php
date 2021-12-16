<?php
ob_start();
include "inc/header.php";
include "inc/sidebar.php";

$db = new Database();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM posts WHERE id = $id";

    if($db->delete($query)) {
        header("location: postlist.php");
    }
}




?>