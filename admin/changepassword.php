<?php ob_start(); include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php
    if(isset($_POST['submit'])) {
        $id = Session::get('id');
        $select_user_query = "SELECT password FROM user WHERE id = $id";

        $post = $db->select($select_user_query);

        if($post) {
            while ($result = $post->fetch_assoc()) {
                $dbPassword = $result['password'];
            }
        }

        $oldPassword = md5($_POST['oldPassword']);
        $newPassword = md5($_POST['newPassword']);

        if($dbPassword == $oldPassword) {
            $update_password_query = "UPDATE user SET password = '$newPassword' WHERE id = $id";
            $post = $db->update($update_password_query);
            header("location: changepassword.php?password_changed='done'");
        } else {
            echo "Not Matched!";
        }
    }





?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Change Password</h2>
                <?php if(isset($_GET['password_changed'])) {
                     echo "<small style='color:green;'>Passowrd Has Been Changed Successfully</small>";

                } ?>
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="oldPassword" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="newPassword" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
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