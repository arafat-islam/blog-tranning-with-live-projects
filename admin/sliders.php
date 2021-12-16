<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Slider Title</th>
							<th width="">Image</th>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
					<?php
                        $serial = 1;
            
                        $db = new Database();

                        $query = "SELECT * FROM sliders";
					
                        $post = $db->select($query);
                        if($post) {
                        while($result = $post->fetch_assoc()) { 
					 
							?>
						
						<tr class="odd gradeX">
							<td><a href="editpost.php?id=<?php echo $result['id'];?>"><?php echo $result['title']; ?></a></td>
							<td class="center"><img width="400" src="../images/slideshow/<?php echo $result['image']; ?>" alt=""></td>
							<td><a href="editslider.php?id=<?php echo $result['id']; ?>">Edit</a> || <a href="deleteslider.php?id=<?php echo $result['id']; ?>">Delete</a></td>
						</tr>
			
							
								
							<!-- <a href="viewpost.php?id=<?php echo $result['id'];?>">View</a>  -->
					
							<?php //if(Session::get('role') == $result['userid'] || Session::get('role') == 0) { ?>
								<!-- || <a href="editpost.php?id=<?php //echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure?');" href="deletepost.php?id=<?php echo $result['id'];?>">Delete</a> -->
						
						
							<?php //} ?>
						
						
						
							</td>
							<?php } } ?>
						</tr>
					</tbody>
				</table>
	
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