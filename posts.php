<?php

class Post
{

    public static string $path = "./data/posts.json";


    public static function Create(string $title, string $data): void
    {
        $dataArray = self::GetData();
        $NewJsonData = [
            "PostId" => (empty($dataArray)) ? "1" : (string) (sizeof($dataArray) + 1),
            "PostTitle" => $title,
            "PostData" => $data,
            "DateTime" => date("Y/m/d"),
        ];
        $dataArray[] = $NewJsonData;
        $jsonString = json_encode($dataArray, JSON_PRETTY_PRINT);
        $fp = fopen(self::$path, 'w');
        fwrite($fp, $jsonString);
        fclose($fp);
    }
    public static function Update() {}
    public static function Delete(): void {}
    public static function View(string $id): array
    {
        $dataArray = self::GetData();
        $sigleData = array();
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if ($dataArray[$i]["PostId"] == $id) {

                $sigleData = $dataArray[$i];
            }
        }
        return $sigleData;
    }
    public static function GetData(): array
    {
        return json_decode(file_get_contents(self::$path), true);
    }
}
