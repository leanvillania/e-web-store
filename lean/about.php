<?php
	session_start();
	//print_r($SESSION);

	if(!isset($_SESSION['ID'])) {
		header('Location: login.php');
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
</head>
<body>
	<h1>About Us</h1>
	<p> You are login as, 
		<?php
		echo $_SESSION['fullname'];
		?>

	<?php
	include('menu.php');
	?>
</body>
</html>
