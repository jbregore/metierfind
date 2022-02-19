<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
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

$employer->c_email = $data->login_email;
$employer->c_password = $data->login_password;

$isLog = $employer->login();

if($isLog){
	http_response_code(201);

	$employer_arr = array(
		'employerid' => $employer->employerid,
		'c_name' => $employer->c_name,
		'c_location' => $employer->c_location,
		'c_website' => $employer->c_website,
		'c_contactname' => $employer->c_contactname,
		'c_mobile' => $employer->c_mobile,
		'c_email' => $employer->c_email,
		'c_password' => $employer->c_password,
		'c_photo' => $employer->c_photo
	);

	echo json_encode($employer_arr);
}
else{
	http_response_code(404);
}

