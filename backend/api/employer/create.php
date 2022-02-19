<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(404);
    echo "Not found!";

    return;
}

include "../../config/database.php";
include "../../models/employer.php";


$database = new Database();
$db = $database->getConnection();

$employer = new Employer($db);

$data = json_decode(file_get_contents("php://input"));

if(
    empty($data->c_name) ||
    empty($data->c_location) ||
    empty($data->c_website) ||
    empty($data->c_contactname) ||
    empty($data->c_mobile) ||
    empty($data->c_email) ||
    empty($data->c_password)
) {
    http_response_code(404);
    echo json_encode(array("message" => "creation failed, incomplete data!"));
    return;
}

$employer->c_name = $data->c_name;
$employer->c_location = $data->c_location;
$employer->c_website = $data->c_website;
$employer->c_contactname = $data->c_contactname;
$employer->c_mobile = $data->c_mobile;
$employer->c_email = $data->c_email;
$employer->c_password = $data->c_password;

$isAdded = $employer->addEmployer();

if($isAdded) {
    http_response_code(201);
    echo json_encode(array("message" => "1 record added"));
    return;
}

http_response_code(500);
