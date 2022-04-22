<?php
require 'C:\xampp\htdocs\FP\vendor\autoload.php';
use Symfony\Component\HttpClient\HttpClient;

#web scrapper
$url = 'https://www.india.gov.in/my-government/schemes';
$httpClient = new \GuzzleHttp\Client();
$response = $httpClient->get($url);
$htmlString = (string) $response->getBody();

//add this line to suppress any warnings
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);

#extraction the links
$extracted_links = [];
$headers = [];
$links = $xpath->evaluate('/html/body/div[1]/main/div[2]/div/section/div/div/div/div/div[3]/div/div[3]/div/div/div/div[2]/div/ul/li/div/span/a');

foreach($links as $link){

$extracted_links[] = $link->getAttribute('href');
$headers[] = $link->textContent;
// echo $link->getAttribute('href').PHP_EOL;

}

$data = [];
$i = 0; 

foreach($extracted_links as $links){

$url1 = 'https://www.india.gov.in'.strip_tags($links);
$response = $httpClient->get($url1);
$htmlString = (string) $response->getBody();
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$info = $xpath->evaluate('/html/body/div/main/div[2]/div/section/div/div/div/div/div/div/div[1]/div/div/div/div/ol/li/div[2]/div/p');
$data[] = $info->item(0)->nodeValue;
$data_post = array(
    "name" => $headers[$i],
    "info" => $data[$i],
    "date" => date("d/m/Y")
);
$httpClient = HttpClient::create();
$reaponse = $httpClient->request('POST', 'C:\xampp\htdocs\FP\APIs\Write\scheme_updates.php'/*url to be added*/, [
    'body' => json_encode($data_post),
    'headers' => ['Content-Type' => 'application/json']
]
);
$i += 1;

}

?>