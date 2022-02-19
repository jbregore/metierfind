<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "GET"){
    http_response_code(404);
    echo "Not found!";

    return;
}


include "../../config/database.php";
include "../../models/jobs.php";


$database = new Database();
$db = $database->getConnection();

$job = new Jobs($db);

$result = $job->fetch_all_jobs_contract();

$job_arr = array();

while($row = $result->fetch_assoc()) {
    array_push($job_arr, $row);
}

http_response_code(200);
echo json_encode($job_arr);