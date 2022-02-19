<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
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

if(
    empty($data->j_title) ||
    empty($data->c_employerid) ||
    empty($data->c_person_name) ||
    empty($data->j_desc) ||
    empty($data->j_quali) ||
    empty($data->j_vacancies) ||
    empty($data->j_location) ||
    empty($data->j_type) ||
    empty($data->j_salary) 
) {
    http_response_code(404);
    echo json_encode(array("message" => "creation failed, incomplete data!"));
    return;
}

$job->j_title = $data->j_title;
$job->c_employerid = $data->c_employerid;
$job->c_person_name = $data->c_person_name;
$job->j_desc = $data->j_desc;
$job->j_quali = $data->j_quali;
$job->j_vacancies = $data->j_vacancies;
$job->j_location = $data->j_location;
$job->j_type = $data->j_type;
$job->j_salary = $data->j_salary;

$isAdded = $job->addJob();

if($isAdded) {
    http_response_code(201);
    echo json_encode(array("message" => "1 record added"));
    return;
}

http_response_code(500);
