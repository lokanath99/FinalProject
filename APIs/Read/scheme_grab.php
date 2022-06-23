<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once 'C:\xampp\htdocs\schemecatalysts\authenticate\authDB.php';
include_once 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';


//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->schemes;
$abbri = $_GET['abbri'];
var_dump($_GET);
// read all records
$filter = ['abbri'=>$abbri];
$option = [];#used for projections
//fetch records
$records = $dbname->$collection->find($filter);

echo json_encode(($records->abbri));
// var_dump() $records;

?>