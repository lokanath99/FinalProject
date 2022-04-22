<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database file
include_once 'C:\xampp\htdocs\FP\authenticate\authDB.php';
use Symfony\Component\HttpClient\HttpClient;


// #calling poll using get
// $httpClient = HttpClient::create();
// $reaponse = $httpClient->request('GET', 'http://localhost/FP/APIs/Poll/poll.php');


$dbname = 'FP';
$collection = 'scheme_updates';

//DB connection
$db = new dbManager();
$conn = $db->dbConnect();

//record to add
$data = json_decode(file_get_contents("php://input", true));

// insert record
$insert = new MongoDB\Driver\BulkWrite();
$insert->insert($data);

$result = $conn->executeBulkWrite("$dbname.$collection", $insert);

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