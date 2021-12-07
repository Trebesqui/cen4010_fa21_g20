<?php
include("header.php");
require("include/config.php");

$username=$_SESSION['username'];
$sql1=("SELECT security FROM users WHERE username='$username'");
$result = mysqli_query($db, $sql1);
$tourresult = $result->fetch_array()[0] ?? '';

$sql=" UPDATE users SET tokens = tokens +2 WHERE username = '$username'";
$sql2=" UPDATE users SET security = 0 WHERE username = '$username'";
if($tourresult=="1"){
    mysqli_query($db, $sql);
    mysqli_query($db, $sql2);

}

?>


<html>

<head>
  <title>Thanks for your order!</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section>
    <p>
      We appreciate your business! If you have any questions, please email
      <a href="mailto:orders@example.com">orders@example.com</a>.
    </p>
  </section>
</body>
</html>
