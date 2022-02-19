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
		"js_id" => $_SESSION['js_id']
	);

echo json_encode($response);
