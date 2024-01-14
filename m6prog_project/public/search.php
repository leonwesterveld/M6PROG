<?php
    require_once '../source/config.php';
    require_once SOURCE_ROOT . '/database.php';
    $connection = database_connect();
    $plaats = $_GET['zoeken'] . '%';
    $sql = 'SELECT * FROM weersomstandighedenPerDag WHERE Plaats=? ORDER BY Datum'; 
    $stmt = $connection->prepare($sql);
    $stmt->bind_param('s', $plaats);
    $stmt->execute();
    $result = $stmt->get_result();

    while( $weersomstandigheid = mysqli_fetch_assoc($result) ) {
        var_dump( $weersomstandigheid );
        echo "</br>";
     }
