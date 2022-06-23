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
if(chkLogin()){
//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->Panchayat_admin;



var_dump(json_encode($_POST));


$result = $collection->insertOne($_POST);
// verify
if ($result->getInsertedCount() == 1) {
    echo json_encode(
		array("message" => "Added the Panchayat. Thankyou")
	);
    sleep(5);
    header('location: http://localhost/schemecatalysts/View/panchayat_dash.php');
} else {
    echo json_encode(
            array("message" => "Error while saving record")
    );
}}
else{
    header("Location: http://localhost/schemecatalysts/index.php");
}


?>