<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
	  $db = new Database();

	  $unread_msg_query = "SELECT * FROM contact WHERE read_status = 0 OR read_status = 1";
  
	  $unread_post = $db->select($unread_msg_query);

      if(isset($_POST['send'])) {
        $fromEmail = $_POST['fromEmail'];
        $toEmail = $_POST['toEmail'];
        $message =  $_POST['message'];
        $subject =  $_POST['subject'];
        
        mail($toEmail, $subject ,$message);
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
    text: 'Something went wrong!',
    })
</script>

<?php } ?>



        <div class="grid_10">

            <div class="box round first grid">
                <h2>Add New Post</h2>
                <?php
                    if(isset($_GET['inserted_successfully'])) {
                        echo "<small style='color:green;'>Data Inserted Successfully</small>";
                    } else {
                        echo "";
                    }


                ?>
                <div class="block">
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="form">

                            <tr>
                                <?php if($unread_post) {
                                    while($result = $unread_post->fetch_assoc()) {
                              
                             ?>
                                <td>
                                    <label>To</label>
                                </td>
                                <td>
                                    <input readonly value="<?php echo $result['email']; ?>" name="toEmail" type="text" placeholder="Enter Post Title..." class="medium" />
                                </td>
                   <?php } } ?>
                            <tr>
                            <tr>
                                <td>
                                    <label>From</label>
                                </td>
                                <td>
                                    <input name="fromEmail" type="text" placeholder="Enter Email..." class="medium" />
                                </td>
                   
                            <tr>
                            <tr>
                                <td>
                                    <label>Subject</label>
                                </td>
                                <td>
                                    <input name="subject" type="text" placeholder="Enter Subject..." class="medium" />
                                </td>
                   
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Message</label>
                                </td>
                                <td>
                                    <textarea name="message" class="tinymce"></textarea>
                                </td>
                            </tr>
                          
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="send" Value="Send" />
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