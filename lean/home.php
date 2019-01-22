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
	<title>Hello World</title>
</head>
<body>
	<h1>Welcome User :)</h1>
	<p> You are login as, 
		<?php
			echo $_SESSION["fullname"];
		?>
	</p>
	<?php
	include('menu.php');
	?>
</body>
</html>
