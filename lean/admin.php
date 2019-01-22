<?php
	session_start();
	//print_r($SESSION);
	$con=mysqli_connect("localhost","root","","lean");

	if(!isset($_SESSION['ID'])) {
		header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Page</title>
</head>
<body>
	<h1>Welcome Administrator!!!</h1>
	<p> You are login as, 
		<?php
			echo $_SESSION["fullname"];
		?>
	</p>

	<h2>List of Users</h2>
	<table border="1">
		<thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Email</th>
				<th>Username</th>
				<th>Password</th>
				<th>Date Added</th>
				<th>Action</th>
			</tr>
		</thead>

		<tbody>
			<?php
			// create a SQL query
			$sql = "SELECT * from user_tbl";

			//execute the query
			$query = mysqli_query($con, $sql);

			//check if there is result
			$count = mysqli_num_rows($query);

			if($count){
				//fetch the data
			while ($row = mysqli_fetch_array($query)) {
				echo '<tr>';
				echo '<td>' . $row['ID'] . '</td>';
				echo '<td>' . $row['fullname'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>' . $row['username'] . '</td>';
				echo '<td>' . $row['password'] . '</td>';
				echo '<td>' . $row['dataadded'] . '</td>';
				echo '<td><a href="viewpost.php?ID=' . $row['ID'] . '">View Post</a></td>';
				echo '</tr>';

			}
				} else {
				// display no data
			}

			?>
			
		</tbody>
</body>
</html>
