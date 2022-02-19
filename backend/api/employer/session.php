<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "GET"){
	http_response_code(404);
	echo "Not Found";
	return;
}

session_start();

$response = array(
		"employerid" => $_SESSION['employerid'],
		"c_name" => $_SESSION['c_name'],
		"c_location" => $_SESSION['c_location'],
		"c_website" => $_SESSION['c_website'],
		"c_contactname" => $_SESSION['c_contactname'],
		"c_mobile" => $_SESSION['c_mobile'],
		"c_email" => $_SESSION['c_email'],
		"c_password" => $_SESSION['c_password'],
		"c_photo" => $_SESSION['c_photo']

	);

echo json_encode($response);
