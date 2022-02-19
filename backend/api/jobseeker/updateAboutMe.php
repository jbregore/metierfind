<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "PUT"){
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
$jobseeker->js_email = $data->js_email;
$jobseeker->js_mobile = $data->js_mobile;
$jobseeker->js_name = $data->js_name;
$jobseeker->js_am_highest_education = $data->js_am_highest_education;
$jobseeker->js_am_gender = $data->js_am_gender;
$jobseeker->js_am_birthday = $data->js_am_birthday;
$jobseeker->js_am_introduce = $data->js_am_introduce;


if($jobseeker->updateAboutMe()) {
	http_response_code(201);
	echo json_encode(
		array("message" => "jobseeker Updated")
	);
} else {
	echo json_encode(
		array("message" => "jobseeker Not Updated")
	);
}