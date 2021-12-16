<?php include "inc/header.php"; ?>


<?php

	
	if(isset($_POST['submit'])) {
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
		$body = $_POST['body'];

		$fname = mysqli_real_escape_string($db->link, $fm->validation($fname));
		$lname = mysqli_real_escape_string($db->link, $fm->validation($lname));
		$email = mysqli_real_escape_string($db->link, $fm->validation($email));
		$body = mysqli_real_escape_string($db->link, $fm->validation($body));



		$error = "";
		if (empty($fname)) {
			$error = "Empty First Name";
		} elseif (empty($lname)) {
			$error = "Empty Last Name";
		} elseif (empty($email)) {
			$error = "Empty Email";
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error = "Invalid Email";
		}
		elseif(empty($body)) {
			$error = "Empty Body";
		} else {
			$query = "INSERT INTO contact (firstname, lastname, email, body) VALUES ('$fname', '$lname', '$email', '$body');";
		
			if($db->insert($query)) {
				$sent = "Message Sent Successfully";
			}
		}


	}


?>


<div class="contentsection contemplete clear">
	<div class="maincontent clear">
		<div class="about">
			<h2>Contact us</h2>
			<?php 
				if(isset($error)) {
					echo "<span style='color:red;'>$error</span>";
				}
				if(isset($sent)) {
					echo "<span style='color:green;'>Message Sent Successfully</span>";
				}
			?>
			<form action="" method="post">
				<table>
					<tr>
						<td>Your First Name:</td>
						<td>
							<input type="text" name="firstname" placeholder="Enter first name" />
						</td>
					</tr>
					<tr>
						<td>Your Last Name:</td>
						<td>
							<input type="text" name="lastname" placeholder="Enter Last name" />
						</td>
					</tr>

					<tr>
						<td>Your Email Address:</td>
						<td>
							<input type="text" name="email" placeholder="Enter Email Address" />
						</td>
					</tr>
					<tr>
						<td>Your Message:</td>
						<td>
							<textarea name="body"></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<input type="submit" name="submit" value="Submit" />
						</td>
					</tr>
				</table>
				<form>
		</div>

	</div>

<?php include "inc/sidebar.php"; ?>
<?php include "inc/footer.php"; ?>