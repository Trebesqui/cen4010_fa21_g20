<?php 
include('server.php');
include('header.php'); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign in - Striker Accounts</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	 
  	<form method="post" action="login.php">
		<?php include('errors.php'); ?>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
			
		</div>
		<p>
			Not a member yet? <a href="register.php">Sign up</a>
		</p><br> 

	  	<p>Or Connect with:</p><br>     
			<button type="submit" class="signUpG"><i class="fab fa-google" ></i>Continue with Google</button><br><br>
			<button type="submit" class="signUpGH"><i class="fab fa-github"></i>Continue with Github</button><br><br>
			<button type="submit" class="signUpFB"><i class="fab fa-facebook-square"></i> Continue with Facebook</button><br><br> 
  	</form>
</body>
</html>

