<?php

class Post
{

    private static string $path = "./data/posts.json";

    public static function Create(string $id, string $title, string $data): void
    {

        $currentData = file_get_contents(self::$path);
        $dataArray = json_decode($currentData, true);
        $NewJsonData = [
            "PostId" => (empty($dataArray)) ? "1" : sizeof($dataArray) + 1,
            "PostTitle" => $title,
            "PostData" => $data,
            "DateTime" =>  date("Y/m/d"),
        ];
        $dataArray[] = $NewJsonData;
        $jsonString = json_encode($dataArray, JSON_PRETTY_PRINT);
        // Write in the file
        $fp = fopen(self::$path, 'w');
        fwrite($fp, $jsonString);
        fclose($fp);
    }
    public static function Update(): void {}
    public static function Delete(): void {}
    public static function View(): void {}
}
