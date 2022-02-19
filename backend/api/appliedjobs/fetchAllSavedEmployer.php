<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
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

$appliedjobs->c_employerid = $data->c_employerid;

$result = $appliedjobs->fetch_allAppliedJobEmployer();

$appliedjobs_arr = array();

while($row = $result->fetch_assoc()) {
    array_push($appliedjobs_arr, $row);
}

http_response_code(200);
echo json_encode($appliedjobs_arr);