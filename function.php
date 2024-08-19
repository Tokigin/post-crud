<?php
require "./posts.php";
if (isset($_GET['type'])) {
    $name = htmlspecialchars($_GET['type']); // Sanitize input
    switch ($name) {
        case "create":
            Post::Create($_POST["title"], $_POST["des"]);
            header("Location: ./add.php?message=complete");
            break;
        default:
            http_response_code(404);
            break;
    }
} else {
    http_response_code(404);
}
