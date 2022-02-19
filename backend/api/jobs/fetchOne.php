<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/jobs.php";

$database = new Database();
$db = $database->getConnection();

$job = new Jobs($db);

$data = json_decode(file_get_contents("php://input"));

$job->j_id = $data->j_id;

$job->fetch_single();

// create array
$job_arr = array(
	'j_id' => $job->j_id,
	'c_employerid' => $job->c_employerid,
	'c_person_name' => $job->c_person_name,
	'j_title' => $job->j_title,
	'j_desc' => $job->j_desc,
	'j_quali' => $job->j_quali,
	'j_vacancies' => $job->j_vacancies,
	'j_location' => $job->j_location,
	'j_type' => $job->j_type,
	'j_salary' => $job->j_salary,
	'j_posted_date' => $job->j_posted_date
);

// make json
echo json_encode($job_arr);