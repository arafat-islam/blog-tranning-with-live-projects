<?php
include "inc/header.php";
include "inc/sidebar.php";


  $db = new Database();
    

    $id = $_GET['id'];

    $query = "SELECT * FROM category WHERE id = $id";

    $post = $db->select($query, '');

    while($result = $post->fetch_assoc()) {
    
?>



<div class="grid_10">
		
        <div class="box round first grid">
            <h2> Dashbord</h2>
            <?php 
                    if(isset($_GET['empty'])) {
                        echo "<span style='color:red'>Must not be empty!</span>";
                    }

                ?>
            <div class="block">               
                <form action="editcat_action.php?id=<?php echo $id;?>" method="post">
                <table class="form">					
                        <tr>
                            <td>
                                <input value="<?php echo $result['name']; ?>" name="category" type="text" placeholder="Enter Category Name..." class="medium" />
                            </td>
                            <?php } ?>
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


<?php
include "inc/footer.php"

?>