<?php

include_once('include/config.php');
if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}

$id = (INT)$_GET['id'];

$username = $_SESSION["username"];
$sql1 = "SELECT id FROM users WHERE username='$username'";
$result = mysqli_query($db, $sql1);
$a = $result->fetch_array();
$uid = $a[0] ?? '';

$sql3 = "SELECT pid FROM post_access WHERE pid='$id' AND uid='$uid'";
$result = mysqli_query($db, $sql3);
$a = $result->fetch_array();

if ($a == NULL || $a[0] != $id) {
    header("Location: buy.php?id=" . $id);
    die();
}
include("header.php");
$sql = "SELECT * FROM posts WHERE id = '$id'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
$id = $row['id'];
$title = $row['title'];
$content = $row['content'];
$posted_by = $row['posted_by'];
$date = $row['date'];
$price = $row['price'];

?>

<!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-3">
                            <div class="d-flex align-items-center mt-lg-5 mb-4">
                                <img class="img-fluid rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." />
                                <div class="ms-3">
                                    <div class="fw-bold"><?php echo $posted_by; ?></div>
                                    <div class="text-muted">Author</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- Post content-->
                            <article>
                                <!-- Post header-->
                                <header class="mb-4">
                                    <!-- Post title-->
                                    <h1 class="fw-bolder mb-1"><?php echo $title; ?></h1>
                                    <!-- Post meta content-->
                                    <div class="text-muted fst-italic mb-2"><?php echo $date; ?></div>
                                </header>
                                <!-- Post content-->
                                <section class="mb-5">
                                    <p class="fs-5 mb-4"><?php echo $content; ?></p>
                                </section>
                            </article>
                            <!-- Comments section-->
                           
                        </div>
                    </div>
                </div>
            </section>
        </main>