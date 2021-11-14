<?php 
include('header.php'); 
include('include/config.php');
?>

	 
<!--Login Form-->
            <div class="form-popup" id="myLogin">
                <form action="login.php" method="POST" class="form-container text-center">
                    <?php include('errors.php'); ?>
                    <br><h1>Welcome to Striker</h1> <br>
                    <label for="email"><b>Email</b></label><br>
                    <input type="text" placeholder="Enter Username" name="username" required><br><br>
                    
                    <label for="password"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="password" required><br><br>
                    
                    <button type="submit" class="LogBtn" name="login_user"> Login </button><br><br>
                    
                    <hr style="width: 70%; margin-left: auto; margin-right: auto;"><br>
		<p>
			Not a member yet? <a href="register.php">Sign up</a>
		</p><br> 

              <!--alternative log in methods NOT COMPLETE-->
                    <button type="submit" class="signUpG"><i class="fab fa-google" ></i>Continue with Google</button><br><br>
                    <button type="submit" class="signUpGH"><i class="fab fa-github"></i>Continue with Github</button><br><br>
                    <button type="submit" class="signUpFB"><i class="fab fa-facebook-square"></i> Continue with Facebook</button><br><br>
                    
                    
            </form>
            </div>

