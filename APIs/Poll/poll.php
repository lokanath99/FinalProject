<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once 'C:\xampp\htdocs\FP\authenticate\authDB.php';
require 'C:\xampp\htdocs\FP\vendor\autoload.php';



//DB connection
$db = new dbManager();
$conn = $db->dbConnect();

$database = $conn->FP;
$collection = $database->users_of_finanacial_services;

$document = array( 
    "name"=>'lokanath',
    "phone"=>'225659625' 
);

$collection->insert($document);


?>