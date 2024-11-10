<?php

require_once '../classes/Db_conn.php';
require_once '../classes/Pdo_methods.php';


$sql = "SELECT name FROM names ORDER BY name ASC";
$pdo = new PdoMethods();
$records = $pdo->selectNotBinded($sql);

$response = new stdClass();

if($records == 'error') {
    $response->masterstatus = 'error';
    $response->msg = 'Could not retrieve names from the database.';
} else {
    $response->masterstatus = 'success';
    $names = "";
    

    foreach ($records as $row) {
        $names .= "<p>{$row['name']}</p>";
    }
    
    $response->names = $names;
}


echo json_encode($response);
?>