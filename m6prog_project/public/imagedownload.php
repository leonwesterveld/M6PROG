<?php
$id = $_GET['link'];
// echo "ID ontvangen: $id";

include_once("../source/database.php");
require_once '../source/config.php';


function FindImage($conn ,$name='')
{
    try
    {
        $q = "SELECT * FROM imagetable WHERE filename = ?";
        $stmt = $conn->prepare($q);
        $stmt->bind_param("s",$name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->fetch_assoc();
    }
    catch(ex)
    {
        echo "error during query" . ex;
    }
}


$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);
$searchResults = FindImage($conn, $id);
$conn->close();

if(empty($searchResults)){
    die("invalid file");
}

    // echo $id;
    $filename = __DIR__ . "/../uploads/" . $searchResults["filename"] . ".png";

    $filepointer = fopen($filename, 'rb');

    header("Content-Type: image/png");
    header("Content-Length: " . filesize($filename));

    fpassthru($filepointer);
    exit;
