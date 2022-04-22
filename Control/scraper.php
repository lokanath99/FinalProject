<?php
require 'C:\xampp\htdocs\FP\vendor\autoload.php';

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
$links = $xpath->evaluate('/html/body/div[1]/main/div[2]/div/section/div/div/div/div/div[3]/div/div[3]/div/div/div/div[2]/div/ul/li/div/span/a');

foreach($links as $link){
$extracted_links[] = $link->getAttribute('href');
// echo $link->getAttribute('href').PHP_EOL;
}

$data = [];

foreach($extracted_links as $links){

$url1 = 'https://www.india.gov.in'.strip_tags($links);
$response = $httpClient->get($url1);
$htmlString = (string) $response->getBody();
libxml_use_internal_errors(true);
$doc = new DOMDocument();
$doc->loadHTML($htmlString);
$xpath = new DOMXPath($doc);
$info = $xpath->evaluate('/html/body/div/main/div[2]/div/section/div/div/div/div/div/div/div[1]/div/div/div/div/ol/li/div[2]/div/p');
$data[$links] = $info->item(0)->nodeValue;

}

// print_r($data);

#running the poll script to catch the DB changes and send sms
// $httpClient = HttpClient::create();
// $response = $httpClient->request('GET', 'C:\xampp\htdocs\FP\APIs\Poll\poll.php');
// echo $response->getStatusCode();

?>