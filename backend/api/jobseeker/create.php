<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(404);
    echo "Not found!";

    return;
}

include "../../config/database.php";
include "../../models/jobseeker.php";


$database = new Database();
$db = $database->getConnection();

$jobseeker = new Jobseeker($db);

$data = json_decode(file_get_contents("php://input"));

$jobseeker->js_name = $data->js_name;
$jobseeker->js_mobile = $data->js_mobile;
$jobseeker->js_email = $data->js_email;
$jobseeker->js_password = $data->js_password;
$jobseeker->js_photo = $data->js_photo;

$isAdded = $jobseeker->addJobseeker();

if($isAdded) {
    http_response_code(201);
    echo json_encode(array("message" => "1 record added"));
    return;
}

http_response_code(500);
