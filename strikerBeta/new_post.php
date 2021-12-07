<?php
include("header.php");
?>

<form action="new_post.php" method="POST" class="form-container text-center">
    <br><br><h1>Add New Post</h1> <br>
    <label for="title">Title</label><br>
    <input type="text" class="title" name="title" required><br><br>

    <label for="content" >Content</label><br>
    <textarea name="content" class="content"></textarea>
    <br><br>
    
    <label for="price" >Price:</label>
    <textarea name="price" class="price"></textarea><br><br><br>

    <button type="submit" class="postBtn" name="new_post">Create New Post </button>
</form>
