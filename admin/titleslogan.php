<?php 
ob_start();
include "inc/header.php";
?>
<?php include "inc/sidebar.php";?>
<?php
    $query = 'SELECT * FROM title_slogan';

    $post = $db->select($query);

    $result = $post->fetch_assoc();

    $previous_logo = '../images/' . $result['logo'];
?>

<?php
    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $slogan = $_POST['slogan'];
        $file = $_FILES['logo'];
        $logo = $file['name'];

        if(empty($logo)) {
            if(!empty($title) && !empty($slogan)) {
                $update_query = "UPDATE title_slogan SET title = '$title', slogan = '$slogan'";
                if($db->update($update_query)) {
                    header("location: titleslogan.php?updated='updated without logo'");
                    move_uploaded_file($file['tmp_name'], '../images/' . $file['name']);
                } else {
                    header("location: titleslogan.php?failed='failed'");
                }
            } else {
                header("location: titleslogan.php?empty='empty'");
            }
        } else {
            if(!empty($title) && !empty($slogan)) {
            $update_query = "UPDATE title_slogan SET title = '$title', slogan = '$slogan', logo = '$logo'";
            if($db->update($update_query)) {
                header("location: titleslogan.php?updated='updated with image'");
                    unlink($previous_logo);
                move_uploaded_file($file['tmp_name'], '../images/' . $file['name']);
            } else {
                header("location: titleslogan.php?failed='failed'");
            }
        } else {
            header("location: titleslogan.php?empty='empty'");
        }

        }
 
    }


?>
<div class="grid_10">

    <div class="box round first grid">
        <h2>Update Site Title and Description</h2>
        <?php
            if(isset($_GET['updated'])) {
                echo "<span style='color:green;'>Updated Title and slogan.</span>";
            } else if (isset($_GET['empty'])) {
                echo "<span style='color:red;'>Can't Be empty!</span>";
            }
        ?>
        <div class="block sloginblock">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Website Title</label>
                        </td>
                        <td>
                            <input value="<?php echo $result['title']; ?>" type="text" placeholder="Enter Website Title..." name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Website Slogan</label>
                        </td>
                        <td>
                            <input  value="<?php echo $result['slogan']; ?>" type="text" placeholder="Enter Website Slogan..." name="slogan" class="medium" />
                        </td>
                    </tr>
                    </tr>

                    <td>
                        <label>Site Logo</label>
                    </td>
                    <td>
                        <input name="logo" type="file" />
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
        <div class="right-sidebar">
                <img width="150" src="../images/<?php echo $result['logo'];?>" alt="">
                <p>Logo</p>
            </div>
    </div>
</div>
<div class="clear">
</div>
</div>
<?php include "inc/footer.php"; ?>

<?php
ob_flush();
?>