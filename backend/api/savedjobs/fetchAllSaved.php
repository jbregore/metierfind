<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    http_response_code(404);
    echo "Not found!";

    return;
}


include "../../config/database.php";
include "../../models/savedjobs.php";


$database = new Database();
$db = $database->getConnection();

$savedjobs = new SavedJobs($db);

$data = json_decode(file_get_contents("php://input"));

$savedjobs->js_id = $data->js_id;

$result = $savedjobs->fetch_allSavedJob();

$savedjobs_arr = array();

while($row = $result->fetch_assoc()) {
    array_push($savedjobs_arr, $row);
}

http_response_code(200);
echo json_encode($savedjobs_arr);