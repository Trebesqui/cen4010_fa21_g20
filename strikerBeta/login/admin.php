<?php
include("header.php");
include('server.php');

if (!isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
?>

<section class="py-5">
    <div class="text-center">
        <h2 class="fw-bolder mb-3">Admin Dashboard </h2>
        <!-- Doesn't exist yet-->
        <a class="text-right" href="addPost.php">Create new post</a>
        <br><br>
        <h5>Posts</h5>
    </div>
</section>
<?php
$sql = "SELECT COUNT(*) FROM posts";
$result = mysqli_query($db, $sql);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 10;
$totalpages = ceil($numrows / $rowsperpage);
$page = 1;
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $page = (INT)$_GET['page'];
}
if ($page > $totalpages) {
    $page = $totalpages;
}
if ($page < 1) {
    $page = 1;
}
$offset = ($page - 1) * $rowsperpage;

$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysqli_query($db, $sql);

if (mysqli_num_rows($result) < 1) {
    echo "No post found";
}
echo "<table class='container px-5'>";
echo "<tr class='hover class='text-center'>";
echo "<th>Date</th>";
echo "<th>Title</th>";
echo "<th>Price</th>";
echo "<th>Action</th>";
echo "</tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $time = $row['date'];
    $title = $row['title'];
    $price = $row['price'];
    ?>
    <tr>
        <td ><?php echo $time; ?></td>
        <td><a href="details.php?id=<?php echo $id; ?>"><?php echo substr($title, 0, 50); ?></a></td>
        <td><?php echo $price; ?></td>
        <td><a href="edit.php?id=<?php echo $id; ?>">Edit</a> | <a href="del.php?id=<?php echo $id; ?>"
                                                                   onclick="return confirm('Are you sure you want to delete this post?')">Delete</a>
        </td>
    </tr>

    <?php
}
echo "</table>";
