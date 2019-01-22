<?php
	function checkUsername($username) {
		$con=mysqli_connect("localhost","root","","lean");

		$sql = "SELECT * from user_tbl WHERE username = '$username'";
		$query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($query);

		return $count;
	}
	//Call to the database goes here...

	$con=mysqli_connect("localhost","root","","lean");
	
	if (isset($_POST['btnsubmit'])) {
		$fullname = $_POST['fullname'];
		$email    = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$confirm  = $_POST['confirm'];
		$password = sha1($password);
		$confirm  = sha1($confirm);

		// this will check if the username already exist
		$checkUsername = checkUsername($username);

		if ($checkUsername >= 1) {
			header('Location: signup.php?duplicate');
		} else {
			if ($password == $confirm) {
				// echo $fullname . " sucessfully added to the database";
				$sql = "INSERT INTO user_tbl (fullname,email,username,password) VALUES('$fullname', '$email', '$username', '$password')";
					
				if (mysqli_query($con, $sql)) {
					echo "<script>alert('New user successfully added to the database');location.href='login.php'</script>";
				} else {
					echo "<script>alert('An error occurs'(;location.href='signup.php'</script>";

				}

			} else {
				echo 'An error occur go back to <a href="signup.php"Sign up</a>';
			}		
		}                                 

	} else {
		header('Location: signup.php');
	}



	?>
