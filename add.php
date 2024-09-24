<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Data</title>
  <?php require "./script/head.php"; ?>
</head>

<body>
  <div class="container">
    <div class="m-5">
      <h1 class="text-center">Add New Post</h1>
    </div>
    <?php
    if (isset($_GET['message']) && $_GET['message'] == "complete"): ?>
      <div class="alert alert-primary alert-dismissible fade show" role="alert"> Complete <button type="button"
          class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    <?php endif; ?>
    <form action="./function.php?type=create" method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" id="title" required />
      </div>
      <div class="mb-3">
        <label for="des" class="form-label">Content</label>
        <!-- <textarea type="text" class="form-control" name="des" id="des" required></textarea> -->
        <!-- Create the editor container -->
        <div id="editor" class="form-control" name="des">
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Add Post</button> <a href="./" class="btn btn-dark">Back</a>
    </form>
  </div>

  <?php
  require_once "./script/script.php";
  ?>
</body>

</html>