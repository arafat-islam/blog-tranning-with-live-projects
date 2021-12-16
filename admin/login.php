<?php include "../lib/Session.php";
Session::loginCheck();
?>
<?php include "../config/config.php";?>
<?php include "../lib/Database.php";?>
<?php include "../helpers/Format.php";?>
<?php
	$db = new Database();
	$fm = new Format();
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">

			<?php
	
		
		if(isset($_POST['login'])) {
			$uername = $fm->validation($_POST['username']);
			$password = $fm->validation($_POST['password']);
	
			$uername = mysqli_real_escape_string($db->link, $uername);
			$password = mysqli_real_escape_string($db->link, md5($_POST['password']));
	
			$query = "SELECT * FROM user WHERE username = '$uername' AND password = '$password'";
	
			$result = $db->select($query);
	
			if($result) {
				$value = mysqli_fetch_assoc($result);
				
				$row = mysqli_num_rows($result);

				if($row > 0) {
						Session::set("login", true);
						Session::set("username", $value['username']);
						Session::set("id", $value['id']);
						Session::set("role", $value['role']);
						header('location:index.php');
				} else {
					echo "<span style='color:red'>Username Or password not matched!</span>";
				}
				
			} else {
				echo "<span style='color:red'>Username Or password not matched!</span>";
			}
	
		}


	?>



			<form action="login.php" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="username" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="password" />
				</div>
				<div>
					<input type="submit" name="login" value="Log in" />
				</div>
				
			</form><!-- form -->
			<div class="button">
				<a href="forgetpassword.php">Forget Password?</a>
			</div>
			<div class="button">
				<a href="#">Blog By Arafat</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>