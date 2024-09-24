<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

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

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <!-- Include the Quill library -->
  <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

  <!-- Initialize Quill editor -->
  <script>
    const quill = new Quill('#editor', {
      theme: 'snow'
    });
    const form = document.querySelector('form');
    form.addEventListener('formdata', (event) => {
      // Append Quill content before submitting
      event.formData.append('des', quill.root.innerHTML);
    });
  </script>
</body>

</html>