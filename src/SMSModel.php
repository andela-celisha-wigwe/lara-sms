<?php

namespace LARASMS;

use GuzzleHttp\Client as GuzzleClient;

class SMSModel
{
    public $to;

    public $message;

    public $from;

    public function __construct($message = null, $to = null, $from = null)
    {
        $this->to = $to;
        $this->from = $from;
        $this->message = $message;
    }

    public function go(GuzzleClient $client = null)
    {
        if ($this->isValid()) {
            $client = $client == null ? new GuzzleClient() : $client;
            echo "Sending '" . $this->message . "' to " . $this->to . ", from " . $this->from . " ...";
            $client->request('GET', "https://smstube.ng/api/sms/send?key=8c8e8f137697a2&to=$this->to&from=$this->from&text=$this->message&type=json");
        } else {
            return "There was a problem sending the SMS";
            // throw new Exception("Error Processing Request", 1);
            
        }

    }

    public function isValid()
    {
        return !is_null($this->to) && !is_null($this->from) && !is_null($this->message); 
    }

    public function isInvalid()
    {
        return !$this->isValid();
    }
    
}