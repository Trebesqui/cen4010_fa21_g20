<?php
include("header.php");
include("include/config.php");
$username=$_SESSION['username'];
echo "<h1>$username</h1>";
$sql=" UPDATE admin SET num_tokens = num_tokens +1 WHERE username = '$username'";
echo $sql;
if (!$dbcon->query($sql)) {
    echo 'Error: ', $dbcon->error;
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

