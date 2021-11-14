<?php
include("header.php");
?>
            <!-- Page Content-->
            <section class="py-5">
                <div class="container px-5">
                    <div class="row gx-5">
                        <div class="col-xl-8">
<?php

if (isset($_GET['q'])) {
    $q = mysqli_real_escape_string($db, $_GET['q']);

    $sql = "SELECT * FROM posts WHERE title LIKE '%{$q}%' OR content LIKE '%{$q}%'";
    $result = mysqli_query($db, $sql);

    if (mysqli_num_rows($result) < 1) {
        echo '<div class="link-dark">No post found!</div>';
    } else {

      echo "<div class='w3-container w3-padding'>Showing results for $q</div><br>";

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
    
      }

    }
}
?>