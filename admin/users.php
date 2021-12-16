<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="15%">Name</th>
							<th width="25%">Email</th>
							<th width="">Details</th>
							<th width="">Role</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
                        $serial = 1;
            
                        $db = new Database();

                        $query = "SELECT * FROM user";
					
                        $post = $db->select($query);
                        if($post) {
                        while($result = $post->fetch_assoc()) { 
							?>
						
                     
						<tr class="odd gradeX">
							<td><a href="editpost.php?id=<?php echo $result['id'];?>"><?php echo $s = !empty($result['name']) ? $result['name'] : "------------" ?></a></td>
							<td><?php echo $s = !empty($result['email']) ? $result['email'] : "------------" ?></td>
							<td><?php echo $s = !empty($result['details']) ? $result['details'] : "------------" ?></td>
                            <td>
                                
                            
                                <?php  if($result['role'] == 0) { echo "Admin" ; } 
                                
                                    elseif ($result['role'] == 1) {
                                        echo "Author";
                                    }

                                    elseif ($result['role'] == 2) {
                                        echo "Editor";
                                    }

                                ?>
                  


                            
                            </td>
							<td><a href="viewuser.php?id=<?php echo $result['id'];?>">View</a> || <a onclick="return confirm('Are you sure?');" href="deleteuser.php?id=<?php echo $result['id'];?>">Delete</a></td>
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