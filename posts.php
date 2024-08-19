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
        Data::WriteData($dataArray);
    }
    public static function Update(string $id, string $title, string $data): void
    {
        $dataArray = self::GetData();
        $NewJsonData = [
            "PostId" => $id,
            "PostTitle" => $title,
            "PostData" => $data,
            "DateTime" => date("Y/m/d"),
        ];
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if ($dataArray[$i]["PostId"] == $id) {
                $dataArray[$i] = $NewJsonData;
            }
        }
        Data::WriteData($dataArray);
    }
    public static function Delete(string $id): void
    {
        $dataArray = self::GetData();
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if ($dataArray[$i]["PostId"] == $id) {
                unset($dataArray[$i]);
            }
        }
        Data::WriteData($dataArray);
    }
    public static function View(string $id): array
    {
        $dataArray = self::GetData();
        $singleData = array();
        for ($i = 0; $i < sizeof($dataArray); $i++) {
            if ($dataArray[$i]["PostId"] == $id) {
                $singleData = $dataArray[$i];
            }
        }
        return $singleData;
    }
    public static function GetData(): array
    {
        return json_decode(file_get_contents(self::$path), true);
    }
}
