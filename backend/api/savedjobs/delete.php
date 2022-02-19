<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "DELETE"){
	http_response_code(404);
	echo "Not Found";
	return;
}

include "../../config/Database.php";
include "../../models/savedjobs.php";

$database = new Database();
$db = $database->getConnection();

$savedjobs = new SavedJobs($db);

$data = json_decode(file_get_contents("php://input"));

$savedjobs->j_id = $data->j_id;

if($savedjobs->delete()) {
	http_response_code(201);
	echo json_encode(
		array('message' => 'Job removed')
	);
} else {
	echo json_encode(
		array('message' => 'Job not removed')
	);
}