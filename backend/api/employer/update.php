<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "PUT"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/employer.php";

$database = new Database();
$db = $database->getConnection();

$employer = new Employer($db);

$data = json_decode(file_get_contents("php://input"));

$employer->employerid = $data->employerid;

$employer->c_name = $data->c_name;
$employer->c_location = $data->c_location;
$employer->c_website = $data->c_website;
$employer->c_contactname = $data->c_contactname;
$employer->c_mobile = $data->c_mobile;
$employer->c_email = $data->c_email;
$employer->c_password = $data->c_password;
$employer->c_photo = $data->c_photo;

if($employer->update()) {
	http_response_code(201);
	echo json_encode(
		array("message" => "Company Updated")
	);
} else {
	echo json_encode(
		array("message" => "Company Not Updated")
	);
}