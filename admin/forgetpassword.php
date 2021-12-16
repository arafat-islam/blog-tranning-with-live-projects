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
	
		
		if(isset($_POST['forget'])) {
			$email = $fm->validation($_POST['email']);
            
            $email = mysqli_real_escape_string($db->link, $email);

            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
               $cehck_mail_query = "SELECT * FROM user WHERE email = '$email'";
               $post = $db->select($cehck_mail_query);
               if($post) {


                $text = substr($email, 0, 3);
                $rand = rand(100000, 999999);
                $newPassword = "$text$rand";
               
                $newPassword = md5($newPassword);

                $to      = '$email';
                $subject = 'New Password';
                $message = 'Use This password to login.';
                $headers = "From: Arafat <arafat.cse5.bu@gmail.com>\r\n".
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n";

                if(mail($to, $subject, $message, $headers)) {
                    
                    $update_query = "UPDATE user SET password = '$newPassword' WHERE email = '$email'";
                    $db->update($update_query);

                    echo "<span style='color:green;'>Password Sent to your Email!</span>";
                } else {
                    echo "<span style='color:red;'>Mail Sent Failed!</span>";
                }


               } else {
                echo "<span style='color:red;'>Your Email don't found!</span>";
               }
            } else {
                echo "<span style='color:red;'>Invalid Email!</span>";
            }

        }

	?>



			<form action="" method="post">
				<h1>Forget Password</h1>
				<div>
					<input type="text" placeholder="email" required="" name="email" />
				</div>
				<div>
					<input type="submit" name="forget" value="Get Password" />
				</div>
				
			</form><!-- form -->
			<div class="button">
				<a href="login.php">Log In?</a>
			</div>
			<div class="button">
				<a href="#">Blog By Arafat</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>     