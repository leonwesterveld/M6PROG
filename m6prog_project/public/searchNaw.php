<?php

include_once("../source/database.php");
require_once '../source/config.php';

$searchInput = isset($_GET['searchPersoon']) ? $_GET['searchPersoon'] : '';


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


function FindPersoon($conn ,$name)
{
    if ($conn)
    {
        try
        {
            $q = "SELECT * FROM naw WHERE naam = ?";
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
$searchResults = FindPersoon($conn,$searchInput);
$conn->close();

header('Content-Type: application/json; charset=utf-8');
echo json_encode($searchResults);