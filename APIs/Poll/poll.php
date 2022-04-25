<?php

// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database file
include_once 'C:\xampp\htdocs\FP\authenticate\authDB.php';
require 'C:\xampp\htdocs\FP\vendor\autoload.php';

//DB connection
$dataManager = new dbManager();
$uri = $dataManager->getConnectionString();

$client = new MongoDB\Client($uri);
$collection = $client->FP->scheme_updates;# set watch for specific collection 

$changeStream = $collection->watch();

for ($changeStream->rewind(); true; $changeStream->next()) {
    if ( ! $changeStream->valid()) {
        continue;
    }

    $event = $changeStream->current();

    if ($event['operationType'] === 'invalidate') {
        break;
    }

    $ns = sprintf('%s.%s', $event['ns']['db'], $event['ns']['coll']);
    $id = json_encode($event['documentKey']['_id']);

    switch ($event['operationType']) {
        case 'delete':
            echo "Deleted document in $ns with _id: $id\n";
            break;

        case 'insert':
            echo "Inserted new document in $ns\n";
            echo json_encode($event['fullDocument']), "\n\n";
            break;

        case 'replace':
            echo "Replaced new document in $ns with _id: $id\n";
            echo json_encode($event['fullDocument']), "\n\n";
            break;

        case 'update':
            echo "Updated document in $ns with _id: $id\n";
            echo json_encode($event['updateDescription']), "\n\n";
            break;
    }

}
?>