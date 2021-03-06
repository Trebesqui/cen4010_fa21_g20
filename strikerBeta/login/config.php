<?php
session_start();

$errors = array();
// connect to the database
$db = mysqli_connect('localhost', 'root', '12345', 'usersdb');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, usertype, password)
  			  VALUES('$username', '$email', 'user', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $row=mysqli_fetch_assoc($results);
    $id= $row['id'];
    
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;

      
      $_SESSION['userId'] = $id;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
       
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

if (isset($_POST['new_post'])) {
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $posted_by = mysqli_real_escape_string($db, $_SESSION['username']);
    $date = date('Y-m-d');
    $price = mysqli_real_escape_string($db, $_POST['price']);
    #if (empty($title)) { array_push($errors, "Title is required"); }
    #if (empty($content)) { array_push($errors, "Content is required"); }

    $query = "INSERT INTO posts (title, content, posted_by, date, price)
  			  VALUES('$title', '$content', '$posted_by', '$date', '$price')";
    mysqli_query($db, $query) or die("failed to post" . mysqli_connect_error());
    $_SESSION['success'] = "Article was posted";
    header('location: index.php');
}

if (isset($_GET['id'])) {
  $id = (INT)$_GET['id'];

  $sql = "SELECT * FROM posts WHERE id = '$id'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  $id = $row['id'];
  $title = $row['title'];
  $content = $row['content'];
  $price = $row['price'];
}

if (isset($_POST['upd'])) {
    $id = $_POST['id'];
    $title = mysqli_real_escape_string($db, $_POST['title']);
    $content = mysqli_real_escape_string($db, $_POST['content']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

    $sql2 = "UPDATE posts SET title = '$title', content = '$content', price = '$price' WHERE id = $id";

    if (mysqli_query($db, $sql2)) {
        header('location: admin.php');

    } else {
        echo "failed to edit." . mysqli_connect_error();
    }
}

//username change
if (isset($_POST['user_change'])) { 

  $email = $_POST['email'];
  $user_change = $_POST['username'];

  $edit = mysqli_query($db,"UPDATE users SET username='$user_change' WHERE email = '$email'");

  if($edit)  {
    mysqli_close($db); // Close connection
    echo "<script type='text/javascript'>alert('Successful Updated!'); window.location.href = 'profile.php';</script>";
    exit;
  }
  else  {
    echo "<script type='text/javascript'>alert('Username is taken!'); window.location.href = 'profile.php';</script>";
    exit;
  } 
    
}

//password change
if (isset($_POST['password_change'])) {

  $email = $_POST['email'];
  $currentPassword = $_POST['currentPassword'];
  $newPassword = $_POST['newPassword'];
  $confirmPassword = $_POST['confirmPassword'];  
  
  if($confirmPassword === $newPassword) {     
    
    $hash = md5($newPassword);
    $res = mysqli_query($db,"UPDATE users SET password='$hash' WHERE email = '$email'");
            
    if($res)
    {
      //Password Successfully Changed.
      echo "<script type='text/javascript'>alert('Password Successful Changed!'); window.location.href = 'profile.php';</script>";
      exit;        
    }
    else
    {
      //Sorry, Something went wrong, Please Try Again.
      echo "<script type='text/javascript'>alert('Sorry, Something went wrong, Please Try Again.'); window.location.href = 'profile.php';</script>";
      exit;
    }
  }
  else
  {
    //Password do not Match.
    echo "<script type='text/javascript'>alert('Password do not Match.!'); window.location.href = 'profile.php';</script>";
    exit;
  }
  
}

?>
