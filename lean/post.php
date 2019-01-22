<?php
	session_start();
	$con = mysqli_connect("localhost","root","","lean");

	//echo $_POST['post'];

	if(isset($_POST['btnsubmit'])) {
		$user_ID = $_SESSION['ID'];
		$post = $_POST['post'];

		$sql = "INSERT INTO post (user_ID, posts) VALUES ('$user_ID', '$post')";
		if (mysqli_query($con, $sql)) {
			header('Location: profile.php?#success');
		} else {
			print_r($_SESSION);
			echo "An error occured! :( ";

		}
	} else
	 echo "gyttytyfytfyt";
?>
