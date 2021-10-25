<?php
    include("include/config.php");
    include("header.php");
//Login form for submit
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($dbcon, $_POST['username']);
        $password = mysqli_real_escape_string($dbcon, $_POST['password']);

        $sql = "SELECT * FROM admin WHERE username = '$username'";

        $result = mysqli_query($dbcon, $sql);
        $row = mysqli_fetch_assoc($result);
        $row_count = mysqli_num_rows($result);
        
        if($row_count == 1 && password_verify($password, $row['password'])){
            $_SESSION['username'] = $username;
            //If looged in , the redirects to index page
            echo "<script> location.href='index.php'; </script>";
            exit;


        } else {
            $message = '<p class="invalid">Invalid username or Password</p>';
        }

    }

    if(isset($message)){ echo $message; }
?>
            <!--Login Form-->
            <div class="form-popup" id="myLogin">
                <form action="" method="POST" class="form-container text-center">
                <!--<button type="button" class="btnCancel" onclick="closeForm()"><p style="font-size:    140%">X</p></button>-->
                    <br><h1>Welcome to Striker</h1> <br>
                    <label for="email"><b>Email</b></label><br>
                    <input type="text" placeholder="Enter Username" name="username" value="<?=strip_tags($_POST['username'])?>" required><br><br>
                    
                    <label for="password"><b>Password</b></label><br>
                    <input type="password" placeholder="Enter Password" name="password" required><br><br>
                    
                    <button type="submit" class="LogBtn" name="submit"> Login </button><br><br>
                    
                    <hr style="width: 70%; margin-left: auto; margin-right: auto;"><br>
                    
                    <p>Or Connect with:</p><br>
                    
                    <!--alternative log in methods NOT COMPLETE-->
                    <p>DOES NOT WORK YET:</p><br>
                    <button type="submit" class="signUpG"><i class="fab fa-google" ></i>Continue with Google</button><br><br>
                    <button type="submit" class="signUpGH"><i class="fab fa-github"></i>Continue with Github</button><br><br>
                    <button type="submit" class="signUpFB"><i class="fab fa-facebook-square"></i> Continue with Facebook</button><br><br>
                    
                    
            </form>
            </div>