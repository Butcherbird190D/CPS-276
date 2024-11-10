<?php

require_once '../classes/Db_conn.php';
require_once '../classes/Pdo_methods.php';


$sql = "DELETE FROM names";
$pdo = new PdoMethods();
$result = $pdo->otherNotBinded($sql);

$response = new stdClass();

if($result == 'error') {
    $response->masterstatus = 'error';
    $response->msg = 'Failed to clear names from the database.';
} else {
    $response->masterstatus = 'success';
    $response->msg = 'All names have been cleared.';
}


echo json_encode($response);
?>