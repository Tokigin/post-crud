<?php
require_once "./posts.php";
$dataArray = Post::GetData();
$pid = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>
    <section class="container ">
        <h1 class="m-5 text-center">All Posts</h1>
        <a href="./add.php" class="btn btn-primary"> Add New</a>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>