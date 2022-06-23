<?php
#yet to implement check previous data


// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// include database file
include_once '/app/authenticate/authDB.php';
include_once '/app/vendor/autoload.php';


//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->scheme_updates;


$data = json_decode(file_get_contents("php://input", true));
$data = (array)$data;
$records = $collection->find(['name'=>$data['name']]);
$records = $records->toArray();
// print_r($records);
//check if record dosnt exist
if(empty($records)){
$result = $collection->insertOne($data);
// verify
if ($result->getInsertedCount() == 1) {
    echo json_encode(
		array("message" => "Record successfully created")
	);
}else {
    echo json_encode(
            array("message" => "Error while saving record")
    );
}}elseif (!empty($records))
echo json_encode(
        array('message'=>'record already exist')
);
?>