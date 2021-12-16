<?php ob_start();
include "inc/header.php";?>
<?php include "inc/sidebar.php";?>


<?php
    $select_query = "SELECT * FROM social";
    $post = $db->select($select_query);

    $result = $post->fetch_assoc();



    if(isset($_POST['submit'])) {

        $facebook = $_POST['facebook'];
        $twitter = $_POST['twitter'];
        $linkedin = $_POST['linkedin'];
        $googleplus = $_POST['googleplus'];
        if(!empty($facebook) && !empty($twitter) && !empty($linkedin) && !empty($googleplus)) {
            $update_query = "UPDATE social SET facebook = '$facebook', twitter = '$twitter', linkedin = '$linkedin', googleplus='$googleplus'";

            if($db->update($update_query)) {
                header("location: social.php?updated='successfully'");
            }
        } else {
            header("location: social.php?empty='empty'");
        }
    
        
    }

?>


        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <?php
                    if(isset($_GET['updated'])) {
                        echo "<small style='color:green;'>Updated.</small>";
                    }
                ?>
                  <?php
                    if(isset($_GET['empty'])) {
                        echo "<small style='color:red;'>Empty.</small>";
                    }
                ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['facebook']; ?>" type="text" name="facebook" placeholder="Facebook link.." class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['twitter']; ?>" type="text" name="twitter" placeholder="Twitter link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['linkedin']; ?>" type="text" name="linkedin" placeholder="LinkedIn link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input value="<?php echo $result['googleplus']; ?>" type="text" name="googleplus" placeholder="Google Plus link.." class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
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
