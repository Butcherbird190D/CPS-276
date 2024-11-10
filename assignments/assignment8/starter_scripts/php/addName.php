<?php

require_once '../classes/Db_conn.php';
require_once '../classes/Pdo_methods.php';


$data = json_decode($_POST['data']);
$nameInput = trim($data->name);


list($firstName, $lastName) = explode(" ", $nameInput, 2);


$formattedName = "{$lastName}, {$firstName}";


$sql = "INSERT INTO names (name) VALUES (:name)";
$pdo = new PdoMethods();
$params = [
    [':name', $formattedName, 'str']
];


$result = $pdo->otherBinded($sql, $params);

$response = new stdClass();
if($result === 'error') {
    $response->masterstatus = 'error';
    $response->msg = 'Could not add name to the database.';
} else {
    $response->masterstatus = 'success';
    $response->msg = 'Name successfully added.';
}


echo json_encode($response);
?>