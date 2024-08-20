<?php

require_once "./posts.php";

use Posts\Post;

if (isset($_GET['type'])) {
    switch (htmlspecialchars($_GET['type'])) {
        case "create":
            Post::Create(Data::String($_POST["title"]), Data::String($_POST["des"]));
            header("Location: ./add.php?message=complete");
            break;
        case "update":
            Post::Update(Data::String($_POST["id"]), Data::String($_POST["title"]), Data::String($_POST["des"]));
            header("Location: ./update.php?message=complete&id=" . Data::String($_POST["id"]));
            break;
        case "delete":
            Post::Delete(Data::String($_GET["id"]));
            header("Location: ./index.php?message=deleted");
            break;
        default:
            http_response_code(404);
            break;
    }
} else {
    http_response_code(404);
    die();
}

class Data
{
    public static function String(string $data): string
    {
        return str_replace(["^", "#", "|", ";", "--", "<?", "?>", "::", "./", "$$"], "", $data);
    }
    public static function WriteData(array $dataArray): void
    {
        $fp = fopen(Post::$path, 'w');
        fwrite($fp, json_encode($dataArray, JSON_PRETTY_PRINT));
        fclose($fp);
    }
}
