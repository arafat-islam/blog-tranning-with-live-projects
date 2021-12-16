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
			if ($post) {
				while ($result = $post->fetch_assoc()) {
			?>
					<h2><?php echo $result['title']; ?></h2>
					<h4><?php echo $fm->formatDate($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
                    <img src="admin/uploads/<?php echo $result['image']; ?>" alt="MyImage" />
					<?php echo $result['body']; ?>

					<div id="disqus_thread"></div>
					<script>
					
						(function() { // DON'T EDIT BELOW THIS LINE
							var d = document,
								s = d.createElement('script');
							s.src = 'https://db-blog.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
						})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
					
					 <div class="relatedpost clear">
						<h2>Related articles</h2>
						<?php
						$catid = $result['cat'];
						$queryRelated = "select * from posts where cat='$catid' order by rand() limit 6";
						$relatedPost = $db->select($queryRelated);
						if ($relatedPost) {
							while ($rresult = $relatedPost->fetch_assoc()) {
						?>

								<a href="post.php?id=<?php echo $rresult['id']; ?>"><img src="admin/uploads/<?php echo $rresult['image']; ?>" alt="post image" /></a>
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