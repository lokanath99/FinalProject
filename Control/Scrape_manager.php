<?php
require 'C:\xampp\htdocs\FP\vendor\autoload.php';

    class Scrape{
        private $url;
        private $xpath;
        public $output = [];

        public function extract($link, $xp, $flag){
            $this->url = $link;
            $this->xpath = $xp;

            $httpClient = new \GuzzleHttp\Client();
            $response = $httpClient->get($this->url);
            $htmlString = (string) $response->getBody();

            //add this line to suppress any warnings
            libxml_use_internal_errors(true);
            $doc = new DOMDocument();
            $doc->loadHTML($htmlString);
            $xpathh = new DOMXPath($doc);
            $opts = $xpathh->evaluate($this->$xpathh);

            if($flag == 1){
                foreach($opts as $link){
                    $this->output[] = $link->getAttribute('href').PHP_EOL;
                    }
                return $this->output;
            }else{
                return $opts->textContent.PHP_EOL;
            }
            
        }
    }


?>