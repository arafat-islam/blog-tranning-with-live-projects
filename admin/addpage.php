<?php ob_start(); include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php
if(isset($_POST['submit'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];

    if(empty($title) || empty($content)) {
        header("location: addpage.php?error=empty");
    } else {
        $query = "INSERT INTO pages ( title, body) VALUES('$title', '$content');";
        $db->insert($query);
        header("location: addpage.php?page_created='success'");
    }
}

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

if(isset($_GET['error'])) {?>

<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Cannot Empty!',
    })
</script>

<?php } ?>



<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Page</h2>
        <?php
            if(isset($_GET['page_created'])) {
                echo "<small style='color:green;'>Page Has Been Created Successfully</small>";
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
                            <input name="title" type="text" placeholder="Enter Post Title..." class="medium" />
                        </td>
                    </tr>

                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea name="content" class="tinymce"></textarea>
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