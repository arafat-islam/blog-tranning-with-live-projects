<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
                <?php 
                    if(isset($_GET['emtpy'])) {
                        echo "<span style='color:red'>Must not Be empty</span>";
                    }

                ?>
               <div class="block copyblock"> 
                 <form action="addcat_action.php" method="post">
                 <table class="form">					
                        <tr>
                            <td>
                                <input name="category" type="text" placeholder="Enter Category Name..." class="medium" />
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