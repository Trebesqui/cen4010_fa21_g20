<?php
include_once 'include/config.php';
include("header.php");

?>

<!DOCTYPE html>
<html>
<div class="container">
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8 mx-auto">
        <h2 class="h3 mb-4 page-title">profile</h2>
        <div class="my-4">
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="setting-tab" data-toggle="tab" href="#setting" role="tab" aria-controls="setting" aria-selected="false">Setting</a>                    
                </li>
            </ul>  

            <form method="post">                
                <hr class="my-4" />
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Change username" /><br>
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email to change username" required><br>
                    </div>                    
                </div>                
                <button type="submit" class="btn btn-primary" name="user_change">Save Change</button>
            </form>

            <form method="post">    
                <hr class="my-4" />
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password" name="currentPassword" class="form-control" class="required"><br>
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password" name="newPassword" class="form-control" required><br>
                        </div>
                        <div>
                            <label>Confirm Password</label>
                            <input type="password" name="confirmPassword" class="form-control" required><br>
                        </div>
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Enter email to change username" required><br>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Password Recommend</p>
                        <p class="small text-muted mb-2">To create a new password, you have to meet all of the following requirements:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimum 8 character</li>
                            <li>At least one special character</li>
                            <li>At least one number</li>
                            <li>Can’t be the same as a previous password</li>
                        </ul>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="password_change">Save Change</button>
            </form>
        </div>
    </div>
</div>

</div>
</html>