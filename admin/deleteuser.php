<?php
ob_start();
include "inc/header.php";
include "inc/sidebar.php";

$db = new Database();

if(isset($_GET['id'])) {

    $loggedInUser = Session::get('id');

    $id = $_GET['id'];

    if($loggedInUser == $id) {
 

        header("users.php?selfdelete='canot delete yourself'");
    } else {
        $query = "DELETE FROM user WHERE id = $id";

        if($db->delete($query)) {
            header("location: users.php");
        } 
    }

}




?>