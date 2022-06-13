<?php 
require 'C:\xampp\htdocs\schemecatalysts\authenticate\authTwilio.php';
class send_sms{
    private $message ;
    private $To;
    
    public function send($msg, $to){
        $this->message = $msg;
        $this->To = $to;
        $twi = new twilio();
        $twilio = $twi->get_client();
        $message = $twilio->messages
                            ->create($this->To,
                                ['body'=>$this->message, 'from'=>$twi->get_phone()]
    );

    echo $message->sid;
    }
}

# sending message format as given below 

// $sendmsg = new send_sms();
// $sendmsg->send('hi from lokanath', '+919880774512');
?>