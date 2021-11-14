<?php
session_start();
include('include/config.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($db, (int) $_GET['id']);
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($db, $sql);

    if ($result) {
        header('location: index.php');
    } else {
        echo "Failed to delete." . mysqli_connect_error();
    }
}