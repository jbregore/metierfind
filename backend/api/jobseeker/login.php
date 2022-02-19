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

$jobseeker->js_email = $data->js_email;
$jobseeker->js_password = $data->js_password;

$isLog = $jobseeker->login();

if($isLog){
	http_response_code(201);

	$jobseeker_arr = array(
		'js_id' => $jobseeker->js_id,
		'js_name' => $jobseeker->js_name,
		'js_mobile' => $jobseeker->js_mobile,
		'js_email' => $jobseeker->js_email,
		'js_password' => $jobseeker->js_password,
		'js_photo' => $jobseeker->js_photo
	);

	echo json_encode($jobseeker_arr);
}
else{
	http_response_code(404);
}

