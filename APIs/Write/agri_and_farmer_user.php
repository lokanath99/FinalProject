<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database file
include_once 'C:\xampp\htdocs\schemecatalysts\authenticate\authDB.php';
include_once 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';

//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->users_of_agri_and_farm;


//record to add
$data = json_decode(file_get_contents("php://input", true));

// insert record

$result = $collection->insertOne($data);

// verify
if ($result->getInsertedCount() == 1) {
    echo json_encode(
		array("message" => "Record successfully created")
	);
} else {
    echo json_encode(
            array("message" => "Error while saving record")
    );
}

?>