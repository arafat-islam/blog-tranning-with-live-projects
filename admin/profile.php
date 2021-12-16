<?php ob_start();

include "inc/header.php";

?>
<?php include "inc/sidebar.php";?>
<?php 
    
    $id = Session::get('id');

	  $loged_in_user_query = "SELECT * FROM user WHERE id = $id";
  
	  $loged_post = $db->select($loged_in_user_query);
	  
?>



<?php

if(isset($_POST['submit'])) {
    
    // $name = $fm->validation($_POST['name']);
    // $email = $fm->validation($_POST['email']);
    // $details = $fm->validation($_POST['details']);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $details = $_POST['details'];

    $name = mysqli_real_escape_string($db->link, $name);
    $email = mysqli_real_escape_string($db->link, $email);
    $details = mysqli_real_escape_string($db->link, $details);

    if(!empty($name) && !empty($email)) {
        $update_profile_query = "UPDATE user SET name = '$name', email = '$email', details = '$details' WHERE id = $id;";
    
        if($db->insert($update_profile_query)) {
            header("location: users.php");
        }  else {
            echo "<span style='color:red'>Query Failed!</span>";
        }
    } else {
        echo "<span style='color:red'>Fields Must not be Empty!</span>";
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
                                <?php if($loged_post) {
                                    while($result = $loged_post->fetch_assoc()) {
                             ?>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input value="<?php echo $result['name']; ?>" name="name" type="text" placeholder="Enter Post Title..." class="medium" />
                                </td>
               
                            <tr>
                            <tr>
                                <td>
                                    <label>Username</label>
                                </td>
                                <td>
                                    <input readonly name="username" type="text" value="<?php echo $result['username']; ?>" placeholder="Enter Email..." class="medium" />
                                </td>
                   
                            <tr>
                            <tr>
                                <td>
                                    <label>Email</label>
                                </td>
                                <td>
                                    <input value="<?php echo $result['email']; ?>" name="email" type="email" placeholder="Enter Subject..." class="medium" />
                                </td>
                   
                            <tr>
                                <td style="vertical-align: top; padding-top: 9px;">
                                    <label>Details</label>
                                </td>
                                <td>
                                    <textarea name="details" class="tinymce"></textarea>
                                </td>
                            </tr>
                          
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Submit" />
                                </td>
                            </tr>

                            <?php } } ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
  <?php include "inc/footer.php"; ?>