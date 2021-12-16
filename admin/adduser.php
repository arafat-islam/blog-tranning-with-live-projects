<?php ob_start();
include "inc/header.php"; 

?>

<?php if(!Session::get('role') == 0)  { header("location:index.php"); ?>
<?php } ?>

<?php include "inc/sidebar.php"; ?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Add New Category</h2>
        <?php 
            if(isset($_GET['emtpy'])) {
                echo "<span style='color:red'>Must not Be empty</span>";
            }

        ?>

        <?php

            if(isset($_POST['submit'])) {
                
                $username = $fm->validation($_POST['username']);
                $password = $fm->validation(md5($_POST['password']));
                $role = $fm->validation($_POST['role']);
                $email = $fm->validation($_POST['email']);

                $username = mysqli_real_escape_string($db->link, $username);
                $password = mysqli_real_escape_string($db->link, $password);
                $role = mysqli_real_escape_string($db->link, $role);
                $email = mysqli_real_escape_string($db->link, $email);

               

                if(!empty($username) && !empty($password) && !empty($email)) {
                    $emailCheckquery = "SELECT * FROM user WHERE email = '$email'";

                    $post = $db->select($emailCheckquery);
    
                    if($post) {
                        echo "<span style='color:red'>User Already Exit!</span>";
                    } else {
                        $role_query = "INSERT INTO user ( username, password, role, email) VALUES('$username', '$password', $role, '$email');";

                        if($db->insert($role_query)) {
                            header("location: users.php");
                        } 
                }
            } else {
                echo "<span style='color:red'>Fields Must not be Empty!</span>";
            }
        }
     
        ?>




        <div class="block copyblock">
            <form action="" method="post">
                <table class="form">
                    <tr>
                        <td>
                           <label for="username">Username</label>
                        </td>
                        <td>
                            <input name="username" type="text" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="Password">Password</label>
                        </td>
                        <td>
                            <input name="password" type="text" placeholder="Enter Category Name..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="email">Email</label>
                        </td>
                        <td>
                            <input name="email" type="email" placeholder="Enter Email.." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                           <label for="role">Role</label>
                        </td>
                        <td>
                            <select name="role" id="role">
                                <option value="">--Select User Role--</option>
                                <option value="0">Admin</option>
                                <option value="1">Author</option>
                                <option value="2">Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
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