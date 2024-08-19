<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="m-5">
            <h1 class="text-center">Add New Post</h1>
        </div>
        <?php
        require "./posts.php";
        if (isset($_GET['id'])) {
            $PostData = Post::View($_GET['id']);
        }
        ?>
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
                    <textarea type="text" class="form-control" name="des" id="des" required><?php echo $PostData["PostData"] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Post</button>
            </form>
        <?php else: ?>
            <h2>no data</h2>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>