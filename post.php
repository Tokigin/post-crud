<?php
require_once "./posts.php";

use Posts\Post;

if (isset($_GET['id'])) {
    $PostData = Post::View($_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
if (isset($_GET['id']) && $PostData != null): ?>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title><?php echo $PostData["PostTitle"] ?></title>
        <?php require "./script/head.php"; ?>
        <style>
            img {
                max-width: 600px;
                max-height: 300px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="m-5">
                <h1 class="text-center"><?php echo $PostData["PostTitle"] ?></h1>
            </div>
            <div class="mb-3 d-flex justify-content-between">
                <h4>ID : <?php echo $PostData["PostId"] ?> </h4>
                <h4>Date : <?php echo $PostData["DateTime"] ?> </h4>
            </div>

            <div class="mb-3">
                <h2>Content : </h2>
                <p class="fs-2">
                    <?php echo $PostData["PostData"] ?>
                </p>
            </div>
            <div class="mb-3">

            </div>
            <a href="./" class="btn btn-dark">Back</a>
        <?php else: ?>
            <h2>no data</h2>
        <?php endif; ?>
        </div>


        <?php
        require_once "./script/script.php";
        ?>
    </body>

</html>