<?php
include_once 'C:\xampp\htdocs\schemecatalysts\authenticate\authDB.php';
include_once 'C:\xampp\htdocs\schemecatalysts\vendor\autoload.php';
use Symfony\Component\HttpClient\HttpClient;

global $url;
$json_data = json_decode(file_get_contents("php://input", true));
$data = (string)$json_data->info;
$data_decode = explode(',',$data);

switch((int)trim($data_decode[2])){
    case 1:
        $url = "https://schemecatalysts.herokuapp.com/APIs//Write/agri_and_farmer_user.php";
        break;
    case 2:
        $url = "https://schemecatalysts.herokuapp.com/APIs//Write/financial_service_users.php";
        break;
    case 3:
        $url = "https://schemecatalysts.herokuapp.com/APIs//Write/rural_dev_users.php";
        break;
    case 4:
        $url = "https://schemecatalysts.herokuapp.com/APIs//Write/skill_dev_and_enterpreneur_user.php";
        break;
    case 5:
        $url = "https://schemecatalysts.herokuapp.com/APIs//Write/women_and_child_users.php";
        break;

}
// echo $url;

$data_post = 
    array(
        'name' => trim($data_decode[0]), 
        'phone' => trim($data_decode[1])
    );

$httpClient = HttpClient::create();

$response = $httpClient->request('POST', $url, [
    'body' => json_encode($data_post),
    'headers' => ['Content-Type' => 'application/json']
]);
    
echo $response->getContent();

?>