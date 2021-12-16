<?php
ob_start();
include "inc/header.php";
include "inc/sidebar.php";

$db = new Database();

    $id = $_GET['id'];
    $query = "SELECT * FROM posts WHERE id = $id";

$post = $db->select($query, '');

while($result = $post->fetch_assoc()) {
    $cat = $result['cat'];

?>

<?php

if(isset($_POST['submit'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $file = $_FILES['image'];
    $image = $file['name'];
    $content = $_POST['content'];
    $tags = $_POST['tags'];
    $author = $_POST['author'];

    move_uploaded_file($file['tmp_name'], './uploads/' . $file['name']);

    if(!empty($image)) {
        if(empty($title) || empty($content)) {
            header("location: editpost.php?id=$id&empty='empty'");
        } else {
            $query = "UPDATE `posts` 
                        SET 
                        `cat`='$category',
                        `title`='$title',
                        `body`='$content',
                        `image`='$image',
                        `author`='$author',
                        `tags`='$tags' 
                        WHERE id = $id";
        
            if($db->update($query)) {
                header("location: editpost.php?id=$id&updated='successfully'");
                }
            }
        } else {
            $query = "UPDATE `posts` 
                        SET 
                        `cat`='$category',
                        `title`='$title',
                        `body`='$content',
                        `author`='$author',
                        `tags`='$tags' 
                        WHERE id = $id";
        
            if($db->update($query)) {
                header("location: editpost.php?id=$id&updated='successfully'");
                }
            }
        }
    


?>



<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Post</h2>
        <?php
        if(isset($_GET['empty'])) {
            echo "<span style='color:red'>Fields can't be empty!</span>";
        }
        ?>
        <?php
        if(isset($_GET['updated'])) {
            echo "<small style='color:green;'>Data Inserted Successfully</small>";
        } else {
            echo "";
        }

    ?>
        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Title</label>
                        </td>
                        <td>
                            <input value="<?php echo $result['title'];?>" name="title" type="text"
                                placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Category</label>
                        </td>

                        <td>


                            <select id="select" name="category">
                                <?php

                            $query = "SELECT category.* FROM category";
                            $categorypost = $db->select($query, '');

                            while($category = $categorypost->fetch_assoc()) {
                                $id = $category['id'] ;
                                

                            ?>

                                <option <?php if($cat == $id) echo "selected"; ?> value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
                           
                                <?php } ?>
                            </select>

                          

                           
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td><img width="200" src="./uploads/<?php echo $result['image']; ?>" alt=""></td>
                    </tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input name="image" type="file" />
                    </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Content</label>
                        </td>
                        <td>
                            <textarea cols="100" rows="10" name="content" class="tinymce"><?php echo  $result['body'];?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Tag</label>
                        </td>
                        <td>
                            <input value="<?php echo $result['tags']; ?>" type="text" name="tags"></input>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Author</label>
                        </td>
                        <td>
                            <input value="<?php echo $result['author'];?>" type="text" name="author"></input>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<div class="clear">
</div>
</div>

<?php } ?>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>