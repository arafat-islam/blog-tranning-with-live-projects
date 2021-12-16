<?php ob_start(); include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

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

 $db = new Database();

if(isset($_POST['submit'])) {


    $title = $_POST['title'];
    $file = $_FILES['image'];
    $image = $file['name'];

}


if(empty($title) || empty($image)) {
    // header("location: addslider.php?error=empty");
} else {
    $query = "INSERT INTO sliders (title, image) VALUES('$title', '$image');";


    if($db->insert($query)) {
        move_uploaded_file($file['tmp_name'], '../images/slideshow/' . $file['name']);
    }



    header("location: addslider.php?inserted_successfully=successfully");

}
?>


        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Slider</h2>
                <?php
                    if(isset($_GET['inserted_successfully'])) {
                        echo "<small style='color:green;'>Slider Inserted Successfully</small>";
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

                            <tr>
                              <td>
                                    <label>Slider Image</label>
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