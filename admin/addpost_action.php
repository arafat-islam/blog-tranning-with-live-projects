<?php
 include "../config/config.php";
 include "../lib/Database.php";

 $db = new Database();

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $file = $_FILES['image'];
    $image = $file['name'];
    $content = mysqli_real_escape_string($db->link, $_POST['content']);
    $tags = $_POST['tags'];
    $author = $_POST['author'];
    $userid = $_POST['userid'];
    move_uploaded_file($file['tmp_name'], './uploads/' . $file['name']);
}


if(empty($title) || empty($content)) {
    header("location: addpost.php?error=empty");
} else {
    $query = "INSERT INTO posts (cat, title, image, body, tags, author, userid) VALUES('$category', '$title', '$image' , '$content', '$tags', '$author', $userid);";

    $db->insert($query);

    header("location: addpost.php?inserted_successfully=successfully");

}
?>