<?php
require_once "./posts.php";
if (isset($_GET['type'])) {
    switch (htmlspecialchars($_GET['type'])) {
        case "create":
            Post::Create($_POST["title"], $_POST["des"]);
            header("Location: ./add.php?message=complete");
            break;
        case "update":
            Post::Update($_POST["id"], $_POST["title"], $_POST["des"]);
            header("Location: ./update.php?message=complete&id=" . $_POST["id"]);
            break;
        case "delete":
            Post::Delete($_GET["id"]);
            header("Location: ./index.php?message=deleted");
            break;
        default:
            http_response_code(404);
            break;
    }
} else {
    http_response_code(404);
}

class Data
{
    public static function WriteData(array $dataArray): void
    {
        $fp = fopen(Post::$path, 'w');
        fwrite($fp, json_encode($dataArray, JSON_PRETTY_PRINT));
        fclose($fp);
    }
}
