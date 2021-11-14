<?php include('header.php'); ?>

<div class="form-popup" id="myLogin">
    <form action="register.php" method="POST" class="form-container text-center">
        <?php include('errors.php'); ?>
        <br><h1>Welcome to Striker</h1> <br>
        <label for="username"><b>Username</b></label><br>
        <input type="text" placeholder="Enter Username" name="username" value="<?php echo $username; ?>"> <br><br>
        <label for="email"><b>Email</b></label><br>
        <input type="text" placeholder="Enter Email" name="email" value="<?php echo $email; ?>">
        <br><br>
        <label for="password"><b>Password</b></label><br>
        <input type="password" placeholder="Enter Password" name="password_1"><br><br>
        <label for="password"><b>Confirm Password</b></label><br>
        <input type="password" placeholder="Confirm Password" name="password_2"><br><br>
        
        <button type="submit" class="signUp" name="reg_user"> Register </button><br><br>
        <hr style="width: 70%; margin-left: auto; margin-right: auto;"><br>
		<p>
			Already a member yet? <a href="login.php">Login</a>
		</p><br>
    </form>
</div>