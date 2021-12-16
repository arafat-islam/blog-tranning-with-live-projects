<?php include "inc/header.php";?>
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



        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Post</h2>

                <?php

                    if(isset($_GET['error'])) {
                        echo "<span style='color:red;'>Fields Must not be empty!</span>";
                    }

                ?>      
                <?php
                    if(isset($_GET['inserted_successfully'])) {
                        echo "<small style='color:green;'>Data Inserted Successfully</small>";
                    } else {
                        echo "";
                    }


                ?>
                <div class="block">
                    <form action="addpost_action.php" method="post" enctype="multipart/form-data">
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
                                    <label>Category</label>
                                </td>
                               
                                <td>
                                 
                                    <select id="select" name="category">
                                    <option value="">Select Category</option>
                                    <?php 
                                    $get_cat = "SELECT * FROM category";

                                    $post = $db->select($get_cat);
                                    while($result = $post->fetch_assoc()) {

                                    ?>
                                        
                                        <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </td>

                               
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
                                    <textarea name="content" class="tinymce"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Tag</label>
                                </td>
                                <td>
                                <input type="text" name="tags"></input>
                                </td>
                            </tr>
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Author</label>
                                </td>
                                <td>
                                    <input readonly value="<?php echo Session::get('username');?>" type="text" name="author"></input>
                                </td>
                                <td>
                                    <input  value="<?php echo Session::get('id');?>" type="hidden" name="userid"></input>
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