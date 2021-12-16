<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
	  $db = new Database();

	  $unread_msg_query = "SELECT * FROM contact WHERE read_status = 0";
  
	  $unread_post = $db->select($unread_msg_query);
	  
	  $read_msg_query = "SELECT * FROM contact WHERE read_status = 1 AND delete_status = 0";
  
	  $read_post = $db->select($read_msg_query);

	   
	  $trash_message_query = "SELECT * FROM contact WHERE read_status = 1 AND delete_status = 1";
  
	  $trash_message_post = $db->select($trash_message_query);
	  
	  
   

?>




<div class="grid_10">
	<div class="box round first grid">
		<h2>Inbox - Unread Messages</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th style="text-align:center;">Serial No.</th>
						<th style="text-align:center;">Name</th>
						<th style="text-align:center;">Email</th>
						<th style="text-align:center;">Message</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $serial = 1; 
					if($unread_post) {
					while($result = $unread_post->fetch_assoc()) { 
						
					?>

					<tr class="odd gradeX" style="background: #FCF7F4;  font-weight:bold;">
						<td><?php echo $serial++; ?></td>
						<td><?php echo $result['firstname'] . ' '. $result['lastname']; ?></td>
						<td width = "10%"><?php echo $result['email']; ?></td>
						<td style="text-align:center;" width="40%"><?php echo $result['body']; ?></td>
						<td width="22%"><a href="viewmsg.php?id=<?php echo $result['id'];?>">View</a> || <a
								href="replymsg.php?id=<?php echo $result['id'];?>">Reply</a> || <a
								href="readmsg.php?id=<?php echo $result['id'];?>">Mark As Read</a></td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>
	</div>

	<div class="box round first grid">
	<h2 style="background-color: #7F7278; color: white">Inbox - Read Messages</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $serial = 1; 
					if($read_post) {
					while($read = $read_post->fetch_assoc()) { 
						
					?>

					<tr class="odd gradeX">
						<td><?php echo $serial++; ?></td>
						<td><?php echo $read['firstname'] . ' '. $read['lastname']; ?></td>
						<td><?php echo $read['email']; ?></td>
						<td><?php echo $read['body']; ?></td>
						<td width="20%"><a href="softdel.php?id=<?php echo $read['id'];?>">Delete</a> || <a
								href="replymsg.php?id=<?php echo $read['id'];?>">Reply</a> || <a
								href="unreadmsg.php?id=<?php echo $read['id'];?>">Mark As Unread</a></td>
					</tr>
					<?php } } ?>
				</tbody>
			</table>
		</div>
	</div>

	
	<div class="box round first grid">
		<h2 style="background-color:red; color: white">Inbox - Trash Message</h2>
		<div class="block">
			<table class="data display datatable" id="example">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Message</th>
						<th style="text-align:center;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php $serial = 1; 
					if($trash_message_post) {
					while($trash = $trash_message_post->fetch_assoc()) { 
						
					?>

					<tr class="odd gradeX">
						<td><?php echo $serial++; ?></td>
						<td><?php echo $trash['firstname'] . ' '. $trash['lastname']; ?></td>
						<td><?php echo $trash['email']; ?></td>
						<td><?php echo $trash['body']; ?></td>
						<td width="20%"><a onclick="return confirm('Permantently Delete?');" href="deletemsg.php?id=<?php echo $trash['id'];?>">Delete</a> || <a
								href="restore.php?id=<?php echo $trash['id'];?>">Restore</a></td>
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