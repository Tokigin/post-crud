<?php
require_once "./posts.php";
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    </body>

</html>