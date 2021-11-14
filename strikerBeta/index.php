<?php
include("header.php");
?>
            <!-- Page Content-->
            <section class="py-5">
                <div class="text-center"><h1 class="fw-bolder mb-3">Welcome <?= $_SESSION['username'] ?></h1></div>
                <div class="container px-5">
                    <div class="row gx-5">
                        <div class="col-xl-8">
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
    echo '<div class="link-dark">No post yet!</div>';
}
while ($row = mysqli_fetch_assoc($result)) {

    $id = htmlentities($row['id']);
    $title = htmlentities($row['title']);
    $content = htmlentities(($row['content']));
    $time = htmlentities($row['date']);
    $price = htmlentities($row['price']);

    echo '<div class="mb-5">';
    echo "<div class='small text-muted'>$time</div>";
    echo "<a class='link-dark' href='details.php?id=$id'><h3>$title</h3></a>";
    echo "<p>$content</p>";
    echo "<div class='small text'>$price cents</div>";
    
    echo '</div>';
}
?>         

                        </div>
                    </div>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2021</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>