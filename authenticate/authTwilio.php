<?php 
require_once 'C:\xampp\htdocs\FP\vendor\autoload.php';

use Twilio\Rest\Client;

class twilio{

    private $sid = 'ACc250b1e5dd5a9c7553b1c0913b086832';
    private $token = '2ed7be1cf7df84f4aa4341de2e3becc5';
    private $phone_num = '+17408075352';
    private $client;

    public function get_client(){
        $this->client = new Client($this->sid, $this->token);
        return $this->client ;
    }

    public function get_phone(){
        return $this->phone_num;
    }

}

?>