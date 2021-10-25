<?php
$dbhost 	= "lamp.cse.fau.edu";
$dbuser 	= "cen4010_fa21_g20@fau.edu";
$dbpass 	= "syqdgsYJ6b";
$dbname 	= "cen4010_fa21_g20";
$charset 	= "utf8";

$dbcon = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$dbcon) {
    die("Connection failed" . mysqli_connect_error());
}
mysqli_select_db($dbcon,$dbname);
mysqli_set_charset($dbcon,$charset);

?>