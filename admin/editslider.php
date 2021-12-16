<?php ob_start(); include "inc/header.php";?>
<?php include "inc/sidebar.php";?>


<?php

$db = new Database();


$id = $_GET['id'];
?>

<!-- jQuery dialog end here-->
<script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
<!--Fancy Button-->
<script src="js/fancy-button/fancy-button.js" type="text/javascript"></script>
<script src="js/setup.js" type="text/javascript"></script>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        setSidebarHeight();
    });
</script>
<!-- /TinyMCE -->
<style type="text/css">
    #tinymce {
        font-size: 15px !important;
    }
</style>


<?php

 $db = new Database();


if(isset($_POST['submit'])) {


    $title = $_POST['title'];
    $file = $_FILES['image'];
    $image = $file['name'];



if (!empty($title)) {
        if(empty($image)) {
            $query = "UPDATE sliders SET title = '$title' WHERE id = $id";
            $db->update($query);
            header("location: editslider.php?id=$id&title_updated='title_updated'");
        } elseif (empty($title)) {
            $query = "UPDATE sliders SET image = '$image' WHERE id = $id";
            move_uploaded_file($file['tmp_name'], '../images/slideshow/' . $file['name']);
            header("location: editslider.php?id=$id&image_updated='image_updated'");
        $db->update($query);
        } elseif (!empty($image) && !empty($title)) {
            $query = "UPDATE sliders SET title = '$title', image = '$image' WHERE id = $id";
            move_uploaded_file($file['tmp_name'], '../images/slideshow/' . $file['name']);
            $db->update($query);
            header("location: editslider.php?id=$id&both_updated='both_updated'");
        } else {
        echo "Fields must not be empty!";
        }
} else {
    // echo "<script>window.location='editslider.php?empty_title='titleempty''</script>";
    header("location: editslider.php?id=$id&empty_title='title_empty'");
}

}




$query = "SELECT * FROM sliders WHERE id = $id";



            
$post = $db->select($query);

$result = $post->fetch_assoc();


?>


<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Slider</h2>
        <?php
                
                    if(isset($_GET['both_updated'])) {
                        echo "<small style='color:green;'>Image & Title Both Updated Successfully</small>";
                    } else {
                        echo "";
                    }
                    if(isset($_GET['image_updated'])) {
                        echo "<small style='color:green;'>Slider Image Successfully</small>";
                    } else {
                        echo "";
                    }
                    if(isset($_GET['title_updated'])) {
                        echo "<small style='color:green;'>Slider Title Updated Successfully</small>";
                    } else {
                        echo "";
                    }
                    if(isset($_GET['empty_title'])) {
                        echo "<small style='color:red;'>Slider Title Can't Be empty!</small>";
                    } else {
                        echo "";
                    }


                ?>
        <div class="block">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>New Title</label>
                        </td>
                        <td>
                            <input value="<?php echo $result['title'] ?>" name="title" type="text"
                                placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>Old Image</td>
                        <td>
                            <img width="200" src="../images/slideshow/<?php echo $result['image']; ?>" alt="">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>New Slider Image</label>
                        </td>
                        <td>
                            <input name="image" type="file" />
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
<?php include "inc/footer.php"; ?>