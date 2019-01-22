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
	<title>Profile</title>
</head>
<body>
	<h1>About Us</h1>
	<p> You are login as, 
		<?php
		echo $_SESSION['fullname'];
		?>
</p>
<form method="post" action="post.php">
	 	<textarea name="post" placeholder="What's on your mind!" rows="8" cols="50"></textarea>
	 	<input type="submit" name="btnsubmit" value="Post">
	 </form>

	 <h2 style="color: blue;">Post goes here...</h2>
	 <?php
	 	$sessionID = $_SESSION['ID'];
	 	$sql = "SELECT * from post INNER JOIN user_tbl ON post.user_ID = user_tbl.ID WHERE post.user_ID = '$sessionID' ORDER BY post.dateofpost DESC";
	 	$query = mysqli_query($con, $sql);
	 	while ($row = mysqli_fetch_array($query)) {
	 ?>
	 	<div>
	 		<h1><?php echo $row['fullname'];?> <small><em><?php echo $row['dateofpost'];?></em></small></h1>
	 		<p><?php echo $row['posts'];?></p>
	 	<a href="#like">Like</a>
		<a href="#comment">Comment</a>
	 	<a href="#share">Share</a>
	 	</div>
	 	<?php }
	 	?>
	 <hr>
	 <footer>
		<?php
			include('menu.php');
	?>
</footer>
</body>
</html>
