<?php

include_once("../source/database.php");
require_once '../source/config.php';

// print_r($_FILES);

// move_uploaded_file($_FILES["image"]["tmp_name"],"../uploads/temp.png");

function handleFile($file, $link){
    $link = uniqid();
    $location = $file["tmp_name"];
    $ext = ".png";
    $filename = "../uploads/$link$ext";
    move_uploaded_file($location, $filename);

    return $filename;
}

function insertImageInDb($type, $size, $filename, $link){
    $conn = database_connect();
    $query = "INSERT INTO imagetable (type, size, filename, link) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $type, 
                            $size, 
                            $filename, 
                            $link);
    return $stmt->execute();
}

function createLink($fileid){
    $link = $_SERVER['HTTP_HOST']."/imagedownload.php?link=$fileid";
    return $link;
}

$response = [
"succeeded" => false,
"message" => "",
"downloadlink" => ""
];

$file = $_FILES["image"];
if ($file["error"] == 0 ){
    $link = uniqid();
    $filename = handleFile($file, $link);
    $response["succeeded"] = insertImageInDb("image/png", $file["size"], $filename, createLink($link));
    $response["downloadlink"] = createLink($link);
}else{
    $response["message"] = "Error during upload: " . $file["error"];
}


header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);