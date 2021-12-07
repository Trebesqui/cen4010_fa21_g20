<?php
include('header.php');
include_once('include/config.php');

require 'google-api/vendor/autoload.php';

// Creating new google client instance
$client = new Google_Client();

// Enter your Client ID
$client->setClientId('956188838969-i82g5bhnvf6208jimov1idpnskvmgi53.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
$client->setRedirectUri('https://lamp.cse.fau.edu/~cen4010_fa21_g20/strikerBeta/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if(isset($_GET['code'])):

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if(!isset($token["error"])){

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        // Storing data into database
        $id = mysqli_real_escape_string($db, $google_account_info->id);
        $email = mysqli_real_escape_string($db, $google_account_info->email);

        // checking user already exists or not
        $get_user = mysqli_query($db, "SELECT * FROM users WHERE `username`='$id' OR email='$email' LIMIT 1");
        if(mysqli_num_rows($get_user) > 0){

            $_SESSION['username']= $email;
            header('Location: index.php');
            exit;

        }

        else{

            // if user not exists we will insert the user
            $query = "INSERT INTO users (username, email)VALUES('$id, '$email')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $email;
          	$_SESSION['success'] = "You are now logged in";
          	header('location: index.php');

        }

    }
    else{
        header('Location: login.php');
        exit;
    }

else:
    // Google Login Url = $client->createAuthUrl();
?>

<!--Login Form-->
            <div class="form-popup" id="myLogin">
                <form action="login.php" method="POST" class="form-container text-center">
                    <?php include('errors.php'); ?>
                    <br><h1>Welcome to Striker</h1> <br>
                    <label for="email"><b>Username</b></label><br>
                    <input type="text" placeholder="Enter Username" name="username" required><br><br>

                    <label for="password"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="password" required><br><br>

										<label>Select user type: </label> <br><br>
										<select name="usertype" id="usertype" >
											<option value="user">User</option>
											<option value="admin">Admin</option>
										</select><br><br>

                    <button type="submit" class="LogBtn" name="login_user"> Login </button><br><br>

                    <hr style="width: 70%; margin-left: auto; margin-right: auto;"><br>
		<p>
			Not a member yet? <a href="register.php">Sign up</a><br><br>
      Or<br><br> Login/Sign Up With: <br><br>
      <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">Google</a><br><br>

		</p><br>

              <!--alternative log in methods NOT COMPLETE
                    <button type="submit" class="signUpG"><i class="fab fa-google" ></i>Continue with Google</button><br><br>
                    <button type="submit" class="signUpGH"><i class="fab fa-github"></i>Continue with Github</button><br><br>
                    <button type="submit" class="signUpFB"><i class="fab fa-facebook-square"></i> Continue with Facebook</button><br><br>
-->

            </form>

            <?php endif; ?>
            </div>
