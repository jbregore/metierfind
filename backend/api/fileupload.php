<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

if($_SERVER["REQUEST_METHOD"] !== "POST"){
	http_response_code(404);
	echo "Not Found";
	return;
}


$response = array();

$upload_dir = '../uploads/';

$upload_url = 'http://localhost/metierfind/backend/uploads/';


if(isset($_FILES['comp-img'])){
	$file = $_FILES['comp-img'];
	$filename = $_FILES['comp-img']['name'];
	$fileTmpName = $_FILES['comp-img']['tmp_name'];
	$fileSize = $_FILES['comp-img']['size'];
	$fileError = $_FILES['comp-img']['error'];
	$fileType = $_FILES['comp-img']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));
	$allowed = array('jpg', 'jpeg', 'png');

	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 10000000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDest = $upload_dir.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDest);

				http_response_code(200);
				$response = array("url" => $upload_url .  $fileNameNew, "message" => "Successfully uploaded");
				echo json_encode($response);
			}
			else{
				http_response_code(400);
				$response = array("url" => $upload_url .  $fileNameNew, "message" => "Image size must be less than 10mb");
				echo json_encode($response);
				return;
			}
		}
		else{
			http_response_code(400);
			$response = array("url" => $upload_url .  $fileNameNew, "message" => "There was an error in your image file");
				echo json_encode($response);
			return;
		}
	}
	else{
		http_response_code(400);
		$response = array("url" => $upload_url .  $fileNameNew, "message" => "Please upload a valid image");
		echo json_encode($response);
		return;
	}


}

