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
$jobseeker->js_photo = $data->js_photo;

if($jobseeker->update()) {
	http_response_code(201);
	echo json_encode(
		array("message" => "jobseeker Updated")
	);
} else {
	echo json_encode(
		array("message" => "jobseeker Not Updated")
	);
}