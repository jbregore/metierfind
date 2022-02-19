<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "POST"){
    http_response_code(404);
    echo "Not found!";

    return;
}


include "../../config/database.php";
include "../../models/jobs.php";


$database = new Database();
$db = $database->getConnection();

$job = new Jobs($db);

$data = json_decode(file_get_contents("php://input"));

$job->c_employerid = $data->c_employerid;

$result = $job->fetch_all();

$job_arr = array();

while($row = $result->fetch_assoc()) {
    array_push($job_arr, $row);
}

http_response_code(200);
echo json_encode($job_arr);