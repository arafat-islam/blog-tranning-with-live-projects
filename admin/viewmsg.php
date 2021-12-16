<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>
<?php 
	  $db = new Database();

      if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $unread_msg_query = "SELECT * FROM contact WHERE id = $id";
        $unread_post = $db->select($unread_msg_query);
        $result = $unread_post->fetch_assoc();

        $query = "UPDATE contact SET read_status = 1 WHERE id = $id";

        $post = $db->update($query);
      }

?>




<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox - View Messages</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <tbody>
                    <tr>
                        <td width="20%" style="font-weight:bold">Name : </td>
                        <td><?php echo $result['firstname'] .' '. $result['lastname'];?></td>
                    </tr>
                    <tr>
                        <td width="20%"style="font-weight:bold">From : </td>
                        <td><?php echo  $result['email']; ?></td>
                    </tr>
                    <tr>
                        <td width="20%" style="font-weight:bold">Message  : </td>
                        <td><?php echo  $result['body']; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"style="font-weight:bold">Date  : </td>
                        <td><?php echo  $result['date']; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold"><button><a href="">Reply</a></button></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold"><button><a href="softdel.php?id=<?php echo $result['id'];?>">Delete</a></button></td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold"><button><a href="unreadmsg.php?id=<?php echo $result['id'];?>">Mark As Unread</a></button></td>
                    </tr>
                </tbody>
                <!-- <thead>
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
				</tbody> -->
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