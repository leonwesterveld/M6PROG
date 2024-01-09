<?php
    
include_once("../source/database.php");
require_once '../source/config.php';

$data = file_get_contents('php://input');
$json = json_decode($data);

$conn = database_connect();
$q = "INSERT INTO naw (naam, email, straat, huisnummer, postcode) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($q);
$stmt->bind_param( "sssss",
                    $json->naam,
                    $json->email,
                    $json->straat,
                    $json->huisnummer,
                    $json->postcode
                );
$stmt->execute();
$result = $stmt->execute();
$response=["succeeded" => $result];

