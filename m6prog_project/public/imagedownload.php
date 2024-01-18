<?php
$id = $_GET['link'];
// echo "ID ontvangen: $id";

include_once("../source/database.php");
require_once '../source/config.php';

function GetQueryResultsAssoc($result)
{
    $results = [];
    if ($result) 
    {
        for ($i = 0; $i < $result->num_rows; $i++) 
        {
            $row = $result->fetch_assoc();
            array_push($results, $row);
        }
    }
    return $results;
}

function FindImage($conn ,$name)
{
    if ($conn)
    {
        try
        {
            $q = "SELECT * FROM imagetable WHERE filename = ?";
            $stmt = $conn->prepare($q);
            $stmt->bind_param("s",$name);
            $stmt->execute();
            $result = $stmt->get_result();
            
            $searchResults = GetQueryResultsAssoc($result);
            return $searchResults;
        }
        catch(ex)
        {
            echo "error during query" . ex;
        }
    }
    return [];
}


$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_SCHEMA);
$searchResults = FindImage($conn, $id);
$conn->close();

if(sizeof($searchResults) == 1){
    // echo $id;
    $filename = $searchResults[0]["filename"];
    $filepointer = fopen($filename, 'rb');

    header("Content-Type: image/png");
    header("Content-Length: " . filesize($filename));

    fpassthru($filepointer);
    exit;
}else{
    die("invalid file");
}