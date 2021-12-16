<div class="footersection templete clear">
	<div class="footermenu clear">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="contact.php">Contact</a></li>

			<?php 

				$get_pages = "SELECT * FROM pages";

				$post = $db->select($get_pages);

				if($post) {
					while ($pages = $post->fetch_assoc()) {

			?>

			<li><a href="page.php?pageid=<?php echo $pages['id'];?>"><?php echo $pages['title'];?></a></li>
<?php
		}
	}

?>
		</ul>
	</div>
	<?php
	$query = "select * from copyright where id='1'";
	$copyright = $db->select($query);
	if ($copyright) {
		while ($result = $copyright->fetch_assoc()) {
	?>
			<p>&copy; <?php echo $result['text']; ?> <?php echo date('Y'); ?></p>
	<?php }
	} ?>
</div>
<div class="fixedicon clear">
	<?php
	$query = "select * from social where id='1'";
	$socialmedia = $db->select($query);
	if ($socialmedia) {
		while ($result = $socialmedia->fetch_assoc()) {
	?>
			<a href="<?php echo $result['facebook']; ?>" target="_blank"><img src="images/fb.png" alt="Facebook" /></a>
			<a href="<?php echo $result['twitter']; ?>" target="_blank"><img src="images/tw.png" alt="Twitter" /></a>
			<a href="<?php echo $result['linkedin']; ?>" target="_blank"><img src="images/in.png" alt="LinkedIn" /></a>
			<a href="<?php echo $result['googleplus']; ?>" target="_blank"><img src="images/gl.png" alt="GooglePlus" /></a>
	<?php }
	} ?>
</div>
<script type="text/javascript" src="js/scrolltop.js"></script>
<script id="dsq-count-scr" src="//db-blog.disqus.com/count.js" async></script>
</body>

</html>