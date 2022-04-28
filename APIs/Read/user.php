<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once '/app/authenticate/authDB.php';
include_once '/app/Control/send_message.php';
include_once '/app/vendor/autoload.php';


//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;

if(isset($_GET['collection'])){
    $collection = (string)$_GET['collection'];
} else $collection = 'users_of_skill_dev_and_enterpreneur';

if(isset($_GET['phone'])){
    $filter = ['phone'=>$_GET['phone']];
} else $filter = [];

// read all records

$option = [];#used for projections
//fetch records
$records = $dbname->$collection->find($filter);

// echo json_encode(iterator_to_array($records));
foreach($records as $rec){
    echo $rec->phone;
}

?>