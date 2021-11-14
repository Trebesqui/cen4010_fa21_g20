<?php
include("header.php");
?>

<form action="edit.php" method="POST" class="form-container text-center">
    <br><br><h1>Update Post</h1> <br>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>Title</label><br>
    <input type="text" name="title" class="title" value="<?php echo $title; ?>"><br><br>

    <label>Content</label><br>
    <textarea id="content" name="content" class="content"><?php echo $content; ?> </textarea><br><br>
    
    <label>Price</label>
    <textarea id="content" name="price" class="price"><?php echo $price; ?> </textarea><br><br>

    <button type="submit" name="upd" class="postBtn">Update Post</button>
</form>