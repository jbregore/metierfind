<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


if ($_SERVER["REQUEST_METHOD"] !== "GET"){
    http_response_code(404);
    echo "Not found!";

    return;
}


include "../../config/database.php";
include "../../models/employer.php";


$database = new Database();
$db = $database->getConnection();

$employer = new Employer($db);

$result = $employer->fetch_all();

$employer_arr = array();
$employer_arr["data"] = array();

while($row = $result->fetch_assoc()) {
    array_push($employer_arr["data"], $row);
}

http_response_code(200);
echo json_encode($employer_arr);