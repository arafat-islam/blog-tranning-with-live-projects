<?php 
include "inc/header.php";

?>
<?php include "inc/sidebar.php";?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Choose Your Theme</h2>
        <div class="block">

            <?php

         


            if(isset($_POST['submit'])) {

                
                $theme = $_POST['theme'] ;

                $themQuery = "UPDATE themes SET theme = '$theme' WHERE id = 1";
                $themeName = strtoupper($theme);

                if($db->update($themQuery)) {
                    echo "<span style='color:green;'>The site is updated to $themeName </span>";
                }

            }

                

                $serial = 1;
    
                $db = new Database();

                $query = "SELECT posts.* , category.name FROM posts 
                    INNER JOIN category ON posts.cat = category.id ORDER BY posts.title DESC";
            
                $post = $db->select($query);
                if($post) {
                while($result = $post->fetch_assoc()) { 
                
                    ?>

            <?php } } ?>
            <form action="" method="post">
            <table class="data display datatable form" id="example">
                <tr>

                <?php
                    $query = "SELECT * FROM themes WHERE id = 1 limit 1";


                    $post = $db->select($query);
                    
                    $themes = $post->fetch_assoc();  
                            
                ?>
                    <td>
                        <input <?php if($themes['theme'] == "default") { echo "checked";} ?> type="radio" name="theme" id="" value="default">Default
                    </td>
                </tr>

                <tr>
                    <td>
                        <input <?php if($themes['theme'] == "green") { echo "checked";} ?> type="radio" name="theme" id="" value="green">Green
                    </td>
                </tr>
           
                <tr>
                    <td>
                        <input type="submit" name="submit" id="">
                    </td>
                </tr>
               
            </table>
            </form>


        </div>
    </div>
</div>


<?php include "inc/footer.php";?>


<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>