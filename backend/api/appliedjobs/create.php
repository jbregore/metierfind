<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(404);
    echo "Not found!";

    return;
}

include "../../config/database.php";
include "../../models/appliedjobs.php";


$database = new Database();
$db = $database->getConnection();

$appliedjobs = new AppliedJobs($db);

$data = json_decode(file_get_contents("php://input"));

$appliedjobs->js_id = $data->js_id;
$appliedjobs->j_id = $data->j_id;

$isAdded = $appliedjobs->addAppliedJob();

if($isAdded) {
    http_response_code(201);
    echo json_encode(array("message" => "1 record added"));
    return;
}

http_response_code(500);
