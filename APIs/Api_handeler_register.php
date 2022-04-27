<?php
include_once '../../authenticate/authDB.php';
include_once '../../vendor/autoload.php';
use Symfony\Component\HttpClient\HttpClient;

global $url;
$json_data = json_decode(file_get_contents("php://input", true));
$data = (string)$json_data->info;
$data_decode = explode(',',$data);

switch((int)trim($data_decode[2])){
    case 1:
        $url = "http://localhost/schemecatalysts/APIs/Write/agri_and_farmer_user.php";
        break;
    case 2:
        $url = "http://localhost/schemecatalysts/APIs/Write/financial_service_users.php";
        break;
    case 3:
        $url = "http://localhost/schemecatalysts/APIs/Write/rural_dev_users.php";
        break;
    case 4:
        $url = "http://localhost/schemecatalysts/APIs/Write/skill_dev_and_enterpreneur_user.php";
        break;
    case 5:
        $url = "http://localhost/schemecatalysts/APIs/Write/women_and_child_users.php";
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