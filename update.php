<?php
require_once "./posts.php";

use Posts\Post;

if (isset($_GET['id'])) {
    $PostData = Post::View($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data</title>
    <?php require "./script/head.php"; ?>
</head>

<body>
    <div class="container">
        <div class="m-5">
            <h1 class="text-center">Update Post</h1>
        </div>

        <?php
        if (isset($_GET['message']) && $_GET['message'] == "complete"): ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert"> Complete <button type="button"
                    class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
        <?php endif; ?>
        <?php if ($PostData != null): ?>
            <form action="./function.php?type=update" method="post">
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="id" id="id" required value=<?php echo $PostData["PostId"]  ?> />
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" name="title" id="title" required value=<?php echo $PostData["PostTitle"] ?> />
                </div>
                <div class="mb-3">
                    <label for="des" class="form-label">Content</label>
                    <div id="editor" class="form-control" name="des"><?php echo $PostData["PostData"] ?></div>
                </div>
                <button type="submit" class="btn btn-primary">Update Post</button> <a href="./" class="btn btn-dark">Back</a>
            </form>
        <?php else: ?>
            <h2>no data</h2>
        <?php endif; ?>
    </div>

    <?php
    require_once "./script/script.php";
    ?>
</body>

</html>