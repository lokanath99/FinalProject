<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once 'C:\xampp\htdocs\FP\authenticate\authDB.php';

$dbname = 'FP';

if(isset($_GET['collection'])){
    $collection = ''.$_GET['collection'];
} else $collection = 'users_of_skill_dev_and_enterpreneur';

if(isset($_GET['phone'])){
    $filter = ['phone'=>$_GET['phone']];
} else $filter = [];

//DB connection
$db = new dbManager();
$conn = $db->dbConnect();

// read all records

$option = [];#used for projections
$read = new MongoDB\Driver\Query($filter, $option);

//fetch records
$records = $conn->executeQuery("$dbname.$collection", $read);

// echo json_encode(iterator_to_array($records));
foreach($records as $rec){
    echo $rec->phone;
}

?>