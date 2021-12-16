<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

                <?php 
                    if(isset($_GET['inserted'])) {
                        echo "<span style='color:green'>Inserted Successfully!</span>";
                    }

                ?>

                <?php 
                    if(isset($_GET['edited'])) {
                        echo "<span style='color:green'>Edited Successfully!</span>";
                    }

                ?>
                    
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
                    <tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>


					</thead>
					<tbody>

                    <?php
                        $serial = 1;

                        $db = new Database();

                        $query = "SELECT * FROM category";

                        $post = $db->select($query);
                        if($post) {
                        while($result = $post->fetch_assoc()) { ?>

                        <tr class="odd gradeX">
							<td><?php echo $serial++;?></td>
							<td><?php echo $result['name']; ?></td>
							<td><a href="editcat.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure?')" href="deletecat.php?id=<?php echo $result['id'];?>">Delete</a></td>
						</tr>

                        <?php } } ?>
					
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>

<?php include "inc/footer.php"; ?>



<?php
                      
    //   include "../config/config.php";
    //   include "../lib/Database.php";
    //   include "../helpers/format.php";

    //   $db = new Database();
    //   $fm = new Format();

    //   $query = "SELECT * FROM posts";

    //   $post = $db->select($query);
    //   if($post) {
    //   while($result = $post->fetch_assoc()) { ?>