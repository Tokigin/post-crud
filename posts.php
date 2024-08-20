<?php

class Post
{

    public static string $path = "./data/posts.json";
    public static function Create(string $title, string $data): void
    {
        $dataArray = self::GetData();
        $NewJsonData = [
            "PostId" =>   uniqid(date("YmdHis")),
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
        $newArray = array();
        foreach ($dataArray as $singleArray) {
            if ($singleArray["PostId"] != $id) {
                $newArray[] = $singleArray;
            }
        }
        Data::WriteData($newArray);
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
        return (empty(json_decode(file_get_contents(self::$path), true))) ? array() : json_decode(file_get_contents(self::$path), true);
    }
}
