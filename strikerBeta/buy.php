<?php 
require'include/config.php';

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    die();
}

$username = $_SESSION["username"];

$sql1 = "SELECT id, tokens FROM users WHERE username='$username'";
$result = mysqli_query($db, $sql1);
$a = $result->fetch_array();
$uid = $a[0] ?? '';
$tokens = $a[1] ?? '';
$post_id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : "";

if ($post_id == "") {
    header('Location: index.php');
    die();
}

$post_id = mysqli_real_escape_string($db, $post_id);
$sql2 = "SELECT price, id FROM posts WHERE id='$post_id'";
$result = mysqli_query($db, $sql2);
$a = $result->fetch_array();
$post_price = $a[0] ?? '';
$post_id = $a[1] ?? '';

$sql3 = "SELECT pid FROM post_access WHERE pid='$post_id' AND uid='$uid'";
$result = mysqli_query($db, $sql3);
$a = $result->fetch_array();

if ($a != NULL && $a[0] == $post_id) {
    header("Location: details.php?id=" . $post_id);
    die();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if ($tokens < $post_price) {
        header("Location: purchase.php");
        die();
    }

    $sql3 = "UPDATE users SET tokens = tokens - $post_price WHERE id = $uid";
    $result = mysqli_query($db, $sql3);
    if ($result != TRUE) {
        die("Could not subtract tokens");
    }

    $sql3 = "INSERT INTO post_access (uid, pid) VALUES ($uid, $post_id)";
    $result = mysqli_query($db, $sql3);
    if ($result != TRUE) {
        die("Could not grant access");
    }

    header("Location: details.php?id=" . $post_id);
    die();
} else {
    header("Location: index.php");
}
?>