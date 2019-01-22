<?php
	session_start();
	//print_r($SESSION);
	$con=mysqli_connect("localhost","root","","leanvillania");
	
	if(!isset($_SESSION['ID'])) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>View Post Page</title>
</head>
<body>
	<h1>Welcome Administrator!!!</h1>
	<p> You are login as, 
		<?php
			echo $_SESSION["fullname"];
		?>
	</p>
	<h2>Post of Individual Users</h2>
	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Post</th>
				<th>Date Posted</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
			if (isset($_GET['ID'])) {
				$ID = $_GET['ID'];
			} else {
				$ID = 0;
			}
			// create a SQL query
			$sql = "SELECT * from post WHERE user_ID = '$ID'";

			//execute the query
			$query = mysqli_query($con, $sql);

			//check if there is result
			$count = mysqli_num_rows($query);

			if($count){
				//fetch the data
			while ($row = mysqli_fetch_array($query)) {
				echo '<tr>';
				echo '<td>' . $row['ID'] . '</td>';
				echo '<td>' . $row['posts'] . '</td>';
				echo '<td>' . $row['dateofposted’] . '</td>';
				echo '<td><a href="#delete">Delete</a></td>';
				echo '</tr>';

			}
				} else {
				// display no data
			}

			?>
			
		</tbody>
</body>
</html>
