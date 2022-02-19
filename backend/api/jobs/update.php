<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "PUT"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/jobs.php";

$database = new Database();
$db = $database->getConnection();

$jobs = new Jobs($db);

$data = json_decode(file_get_contents("php://input"));

$jobs->j_id = $data->j_id;

$jobs->c_employerid = $data->c_employerid;
$jobs->c_person_name = $data->c_person_name;
$jobs->j_title = $data->j_title;
$jobs->j_desc = $data->j_desc;
$jobs->j_quali = $data->j_quali;
$jobs->j_vacancies = $data->j_vacancies;
$jobs->j_location = $data->j_location;
$jobs->j_type = $data->j_type;
$jobs->j_salary = $data->j_salary;

if($jobs->update()) {
	http_response_code(201);
	echo json_encode(
		array("message" => "Job Updated")
	);
} else {
	echo json_encode(
		array("message" => "Job Not Updated")
	);
}