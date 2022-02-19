<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/jobseeker.php";

$database = new Database();
$db = $database->getConnection();

$jobseeker = new Jobseeker($db);

$data = json_decode(file_get_contents("php://input"));
$jobseeker->js_id = $data->js_id;

$jobseeker->fetchDetails();

$jobseeker_arr = array(
	'js_id' => $jobseeker->js_id,
	'js_name' => $jobseeker->js_name,
	'js_mobile' => $jobseeker->js_mobile,
	'js_email' => $jobseeker->js_email,
	'js_password' => $jobseeker->js_password,
	'js_photo' => $jobseeker->js_photo,
	'js_jp_availability' => $jobseeker->js_jp_availability,
	'js_jp_job_type' => $jobseeker->js_jp_job_type,
    'js_jp_expected_sal' => $jobseeker->js_jp_expected_sal,
	'js_am_highest_education' => $jobseeker->js_am_highest_education,
	'js_am_gender' => $jobseeker->js_am_gender,
    'js_am_birthday' => $jobseeker->js_am_birthday,
	'js_am_introduce' => $jobseeker->js_am_introduce,
    'js_resume' => $jobseeker->js_resume
);
               
echo json_encode($jobseeker_arr);