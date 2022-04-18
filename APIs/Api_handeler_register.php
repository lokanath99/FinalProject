<?php

$data = json_decode(file_get_contents("php://input", true));
$data = $data->info;
$data_decode = $data.explode(",", $data);
$url = "http://localhost/FP/APIs/Write/agri_and_farmer_user.php";

switch(trim($data_decode[2])){
    case 1:
        $url = "http://localhost/FP/APIs/Write/agri_and_farmer_user.php";
        break;
    case 2:
        $url = "http://localhost/FP/APIs/Write/financial_service_users.php";
        break;
    case 3:
        $url = "http://localhost/FP/APIs/Write/rural_dev_users.php";
        break;
    case 4:
        $url = "http://localhost/FP/APIs/Write/skill_dev_and_enterpreneur_user.php";
        break;
    case 5:
        $url = "http://localhost/FP/APIs/Write/women_and_child_users.php";
        break;

}

$data_post = array('name' => $data_decode[0], 'phone' => $data_decode[1]);

print($data_post);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data_post)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */ }

var_dump($result);

?>