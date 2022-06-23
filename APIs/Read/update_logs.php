<?php

#check for daily updates and call send messages with the info

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once '/app/authenticate/authDB.php';
include_once '/app/Control/send_message.php';
include_once '/app/vendor/autoload.php';


$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->scheme_updates;


$filter = ['date' => date("d/m/Y")];
$option = [];
$records = $collection->find($filter);
$records = $records->toArray();
// echo json_encode(iterator_to_array($records));
$users_collection = ['users_of_skill_dev_and_enterpreneur', 'users_of_finanacial_services', 'users_of_rural_dev', 'users_of_women_and_child', 'users_of_agri_and_farm'];#add all the user collection afterwards
foreach($users_collection as $coll){
    $collection1 = $dbname->$coll;
    $filter1 = [];
    $option1 = [];
    $users = $collection1->find();
    foreach($users as $user){
        $phone = $user->phone;
        $phone = '+91'.$phone;
        foreach($records as $rec){
            $message = $rec->info;
            echo json_encode(array(
                'phone'=>$phone,
                'message'=>$message
            )); 
            $sendmsg = new send_sms();
            $sendmsg->send($message, $phone);
        }        
    }

}


?>