<?php include "inc/header.php"; ?>

<?php
$postid = mysqli_real_escape_string($db->link, $_GET['id']);
if (!isset($postid) || $postid == NULL) {
	header("Location: 404.php");
} else {
	$id = $postid;
}
?>

<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
		<?php

			$query = "SELECT * FROM posts WHERE id = $id";

			$post = $db->select($query);

			if($post) {
				while($result = $post->fetch_assoc()) {	?>
	
			<h2><?php echo $result['title']; ?></h2>
			<h4><?php echo $result['date']; ?>, By <a href="#"> <?php echo $result['author']; ?></a></h4>
			<img src="admin/uploads/<?php echo $result['image']; ?>" alt="MyImage" />
			<p><?php echo $result['body']; ?></p>
		
			<div class="relatedpost clear">
				<h2>Related articles</h2>
				<?php
					$cat = $result['cat'];
					$releted_query = "SELECT * FROM posts WHERE cat = $cat";

					$releted_post = $db->select($releted_query);

					if($releted_post) {
						while($related_result = $releted_post->fetch_assoc()) {	?>
				<a href="post.php?id=<?php echo $related_result['id']; ?>"><img src="admin/uploads/<?php echo $related_result['image']; ?>" alt="post image" /></a>
			
				<?php }
						} else {
							"No Related Post Available";
						} ?>
					</div>
			<?php }
			} else {
				header("Location:404.php");
			} ?>
		</div>

	</div>
	<?php include "inc/sidebar.php"; ?>

</div>

<?php include "inc/footer.php"; ?>
