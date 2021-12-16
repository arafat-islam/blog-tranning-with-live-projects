<?php include "config/config.php"; ?>
<?php include "lib/Database.php"; ?>
<?php include "helpers/Format.php"; ?>
<?php
$db = new Database();
$fm = new Format();
?>

<!DOCTYPE html>
<html>

<head>
<?php include 'scripts/meta.php'; ?>
<?php include 'scripts/css.php'; ?>
<?php include 'scripts/js.php'; ?>
</head>

<body>
<div class="headersection templete clear">
	<a href="index.php">
		<div class="logo">
			<?php
			$query = "select * from title_slogan where id='1'";
			$blog_title = $db->select($query);
			if ($blog_title) {
				while ($result = $blog_title->fetch_assoc()) {
			?>
			<img src="images/<?php echo $result['logo']; ?>" alt="Logo" />
			<h2><?php echo $result['title']; ?></h2>
			<p><?php echo $result['slogan']; ?></p>
			<?php }
			} ?>
		</div>
	</a>
	<div class="social clear">
		<div class="icon clear">
			<?php
			$query = "select * from social where id='1'";
			$socialmedia = $db->select($query);
			if ($socialmedia) {
				while ($result = $socialmedia->fetch_assoc()) {
			?>
			<a href="<?php echo $result['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<a href="<?php echo $result['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			<a href="<?php echo $result['linkedin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
			<a href="<?php echo $result['googleplus']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			<?php }
			} ?>
		</div>
		<div class="searchbtn clear">
			<form action="search.php" method="get">
				<input type="text" name="keyword" placeholder="Search keyword..." />
				<input type="submit" name="submit" value="Search" />
			</form>
		</div>
	</div>
</div>
<div class="navsection templete">
	<?php
	$path = $_SERVER['SCRIPT_FILENAME'];
	$currentpage = basename($path, '.php');
	?>
	<ul>
		<li><a <?php
				if ($currentpage == 'index') {
					echo 'id="active"';
				}
				?> href="index.php">Home</a></li>

<li><a <?php
				if ($currentpage == 'about') {
					echo 'id="active"';
				}
				?> href="about.php">About Us</a></li>
		<?php
		$query = "select * from pages";
		$pages = $db->select($query);
		if ($pages) {
			while ($result = $pages->fetch_assoc()) {
		?>
		<li><a <?php
						if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']) {
							echo 'id="active"';
						}
						?> href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a> </li>
		<?php }
		} ?>
		<li><a <?php
				if ($currentpage == 'contact') {
					echo 'id="active"';
				}
				?> href="contact.php">Contact</a></li>
	</ul>
</div>