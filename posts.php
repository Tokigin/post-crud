<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    http_response_code(404);
    die();
}
class Post
{
    public static string $path = "./data/posts.json";
    public static function Create(string $title, string $data): void
    {
        $dataArray = self::GetData();
        $dataArray[] = [
            "PostId" => uniqid(date("YmdHis")),
            "PostTitle" => $title,
            "PostData" => $data,
            "DateTime" => date("Y/m/d"),
        ];
        Data::WriteData($dataArray);
    }
    public static function Update(string $id, string $title, string $data): void
    {
        $dataArray = self::GetData();
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if ($dataArray[$i]["PostId"] == $id) {
                $dataArray[$i] = [
                    "PostId" => $id,
                    "PostTitle" => $title,
                    "PostData" => $data,
                    "DateTime" => date("Y/m/d"),
                ];
            }
        }
        Data::WriteData($dataArray);
    }
    public static function Delete(string $id): void
    {
        $newArray = array();
        foreach (self::GetData() as $singleArray) {
            if ($singleArray["PostId"] != $id) {
                $newArray[] = $singleArray;
            }
        }
        Data::WriteData($newArray);
    }
    public static function View(string $id): array
    {
        $singleData = array();
        foreach (self::GetData() as $singleArray) {
            if ($singleArray["PostId"] == $id) {
                $singleData = $singleArray;
            }
        }
        return $singleData;
    }
    public static function GetData(): array
    {
        return (empty(json_decode(file_get_contents(self::$path), true))) ? array() : json_decode(file_get_contents(self::$path), true);
    }
}
