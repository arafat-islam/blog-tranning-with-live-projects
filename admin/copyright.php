<?php 
ob_start();

include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php

$get_cp = "SELECT * FROM copyright";

$get_cp_post = $db->select($get_cp);
$result = $get_cp_post->fetch_assoc();


    if(isset($_POST['submit'])) {
        $text = $_POST['copyright'];
        $query = "UPDATE copyright SET text = '$text'";

        if($db->update($query)) {
            header("location: copyright.php?success='done'");
        }
    }
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input value="<?php echo $result['text']; ?>" type="text" placeholder="Enter Copyright Text..." name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
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