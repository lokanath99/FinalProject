<?php
include_once '/app/authenticate/authDB.php';
include_once '/app/vendor/autoload.php';


//DB connection
$db = new dbManager();
$conn = $db->dbConnect();
$dbname = $conn->FP;
$collection = $dbname->Panchayat_messages;


$result = $collection->insertOne($_POST);
$msg  = $_POST['name'] ."\n". $_POST['info'];
$cat = $_POST['cat'];
$records = [];
$sendmsg = new send_sms();
switch($cat) {
    case "1":
        $collection = $dbname->users_of_agri_and_farm;
        $records = $collection->find();
        foreach($records as $rec){
            $phone = $rec->phone;
            echo "$msg sent to $phone";
            $sendmsg->send($msg, $phone);
        }
        header('location: https://schemecatalysts.herokuapp.com/');
        break;
    case "2":
        $collection = $dbname->users_of_finanacial_services;
        $records = $collection->find();
        foreach($records as $rec){
            $phone = $rec->phone;
            echo "$msg sent to $phone";
                $sendmsg->send($msg, $phone);
        }
        header('location: https://schemecatalysts.herokuapp.com/');
        break;
    case "3":
        $collection = $dbname->users_of_rural_dev;
        $records = $collection->find();
        foreach($records as $rec){
            $phone = $rec->phone;
            echo "$msg sent to $phone";
                $sendmsg->send($msg, $phone);
        }
        header('location: https://schemecatalysts.herokuapp.com/');
        break;
    case "4":
        $collection = $dbname->users_of_skill_dev_and_enterpreneur;
        $records = $collection->find();
        foreach($records as $rec){
            $phone = $rec->phone;
            echo "$msg sent to $phone";
                        $sendmsg->send($msg, $phone);
        }
        header('location: https://schemecatalysts.herokuapp.com/');
        break;
    case "5":
        $collection = $dbname->users_of_women_and_child;
        $records = $collection->find();
        foreach($records as $rec){
            $phone = $rec->phone;
            echo "$msg sent to $phone";
                $sendmsg->send($msg, $phone);
        }
        header('location: https://schemecatalysts.herokuapp.com/');
        break;
}
header('location: https://schemecatalysts.herokuapp.com/');
?>
