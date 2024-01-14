<?php
    
include_once("../source/database.php");
require_once '../source/config.php';

$data = file_get_contents('php://input');
$json = json_decode($data);

$conn = database_connect();

$sql = 'SELECT COUNT(1) as count FROM naw WHERE email=?'; 
$checkstmt = $conn->prepare($sql);
$checkstmt->bind_param('s', $json->email);
$checkstmt->execute();
$result = $checkstmt->get_result();

$count = mysqli_fetch_assoc($result);

if ($count['count'] > 0) {
    echo json_encode([
        'success' => false,
        'count' => $count['count'],
        'error' => 'Dit email adres komt al voor in de database'
    ]);
    return false;
} else {
    $q = "INSERT INTO naw (naam, email, straat, huisnummer, postcode) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($q);
    $stmt->bind_param( "sssss",
                        $json->naam,
                        $json->email,
                        $json->straat,
                        $json->huisnummer,
                        $json->postcode
                    );
    $result = $stmt->execute();
    $response=["succeeded" => $result];
    echo json_encode([
        'success' => true,
        'count' => $count['count'],
        'error' => 'Geen'
    ]);
    }    


