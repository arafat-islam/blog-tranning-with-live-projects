<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<td>Serial</td>
							<th>Post Title</th>
							<th>Content</th>
							<th>Category</th>
							<th>Image</th>
							<th>Author</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        $serial = 1;
            
                        $db = new Database();

                        $query = "SELECT posts.* , category.name FROM posts 
							INNER JOIN category ON posts.cat = category.id ORDER BY posts.title DESC";
					
                        $post = $db->select($query);
                        if($post) {
                        while($result = $post->fetch_assoc()) { 
					 
							?>
						
						<tr class="odd gradeX">
							<td><?php echo $serial++; ?></td>
							<td><?php echo $result['title']; ?></td>
							<td><?php echo $fm->textShorten($result['body'], 50); ?></td>
							<td><?php echo $result['name']; ?></td>
							<td style="padding:10px;"><img width="70" src="./uploads/<?php echo $result['image']; ?>" alt=""></td>
							<td><?php echo $result['author']; ?></td>
							<td><?php echo $result['date']; ?></td>


							<td>
								
							<a href="viewpost.php?id=<?php echo $result['id'];?>">View</a> 
					
							<?php if(Session::get('role') == $result['userid'] || Session::get('role') == 0) { ?>
								|| <a href="editpost.php?id=<?php echo $result['id'];?>">Edit</a> || <a onclick="return confirm('Are you sure?');" href="deletepost.php?id=<?php echo $result['id'];?>">Delete</a>
						
						
							<?php } ?>
						
						
						
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