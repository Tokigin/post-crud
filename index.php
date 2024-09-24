<?php
require_once "./posts.php";

use Posts\Post;

$dataArray = Post::GetData();
$pid = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php require "./script/head.php"; ?>
    <style>
        img {
            max-height: 300px;
        }
    </style>

</head>

<body>
    <section class="container ">
        <h1 class="m-5 text-center">All Posts</h1>
        <a href="./add.php" class="btn btn-primary"> Add New</a>
        <a href="./export.php" class="btn btn-success"> Export Excel</a>
        <a href="./data/posts.json" class="btn btn-dark"> View Json</a>


        <?php
        if (isset($_GET['message']) && $_GET['message'] == "deleted"): ?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert"> Post Deleted <button type="button"
                    class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Data</th>
                    <th scope="col">Date</th>
                    <th scope="col">Update/Delete</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($dataArray as $row) { ?>
                    <tr>
                        <td><?php echo $pid++ ?></td>
                        <td><?php echo $row["PostTitle"]; ?></td>
                        <td><?php echo $row["PostData"]; ?></td>
                        <td><?php echo $row["DateTime"]; ?></td>
                        <td>
                            <a href="./post.php?id=<?php echo $row["PostId"]; ?>" type="button"
                                class="btn btn-primary m-1">View</a>
                            <a href="./update.php?id=<?php echo $row["PostId"]; ?>" type="button"
                                class="btn btn-secondary m-1">Update</a>
                            <a href="./function.php?type=delete&id=<?php echo $row["PostId"]; ?>" type="button"
                                class="btn btn-danger m-1">Delete</a>
                        </td>
                    </tr>
                <?php
                } ?>
            </tbody>
        </table>

    </section>

    <?php
    require_once "./script/script.php";
    ?>
</body>

</html>