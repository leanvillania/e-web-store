<?php
	$con=mysqli_connect("localhost","root","","lean");
	if (isset($_POST['btnsubmit'])) {
		//echo 'hello';
		$username = $_POST['username'];
		$password = $_POST['password'];
		$password = sha1($password);
		$sql = "SELECT * from user_tbl WHERE username = '$username' AND password = '$password'";
		$query = mysqli_query($con, $sql);
		$count = mysqli_num_rows($query);
		//echo $count;
		if ($count >= 1) {
			
			//Set session variable
			// A session is a way to store information (in variables) to be usedaccross multiple pages.
			// Start the session
			session_start();
			while ($row = mysqli_fetch_array($query)) {
				// Set Session variables 
				$_SESSION["ID"] = $row['ID'];
				$_SESSION["fullname"] = $row['fullname'];
				$_SESSION["email"] = $row['email'];
				$_SESSION["username"] = $row['username'];
			}
			header('Location: home.php');
		} else {
			header('Location: login.php');
	}
	} else {
		header('Location: signup.php');
	}

	?>
