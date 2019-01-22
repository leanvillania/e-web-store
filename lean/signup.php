<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
</head>
<body>
	<h1>Sign up</h1>
	<form method="post" action="signUpProcess.php">
		Full name
		<input type="text" name="fullname"
		required="" placeholder="Enter your name"><br>
		Email
		<input type="email" name="email"
		required=""><br> 
		Username
		<input type="text" name="username"
		required=""><br>
		Password
		<input type="password" name="password"
		required=""><br>
		Confirm Password
		<input type="password" name="confirm"
		required=""><br>
		<input type="submit" name="btnsubmit" value="Sign up">
		<br><a href="login.php">Login now!</a>

	</form>
</body>
</html>

