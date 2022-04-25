<?php

#check for daily updates and call send messages with the info

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once 'C:\xampp\htdocs\FP\authenticate\authDB.php';
include_once 'C:\xampp\htdocs\FP\Control\send_message.php';

$dbname = 'FP';
$collection = 'scheme_updates';
$db = new dbManager();
$conn = $db->dbConnect();


$filter = ['date' => date("d/m/Y")];
$option = [];
$read = new MongoDB\Driver\Query($filter, $option);

$records = $conn->executeQuery("$dbname.$collection", $read);
// echo json_encode(iterator_to_array($records));
$users_collection = ['users_of_skill_dev_and_enterpreneur', 'users_of_finanacial_services', 'users_of_rural_dev', 'users_of_women_and_child', 'users_of_agri_and_farm'];#add all the user collection afterwards
foreach($users_collection as $coll){
    $collection1 = $coll;
    $filter1 = [];
    $option1 = [];
    $read1 = new MongoDB\Driver\Query($filter1, $option1);
    $users = $conn->executeQuery("$dbname.$collection1", $read1);
    foreach($users as $user){
        $phone = $user->phone;
        foreach($records as $rec){
            $message = $rec->info;
            // echo json_encode(array(
            //     'phone'=>$phone,
            //     'message'=>$message
            // ));
            $sendmsg = new send_sms();
            $sendmsg->send($message, $phone);
        }        
    }

}


?>