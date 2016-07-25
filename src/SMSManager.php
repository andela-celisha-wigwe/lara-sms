<?php

namespace LARASMS;

use GuzzleHttp\Client as GuzzleClient;
use LARASMS\SMSModel as SMS;

class SMSManager
{
    protected $sms;

    // https://smstube.ng/api/sms/send?key=8c8e8f137697a2&to=+2347038423581&from=&text=Hello&type=json
    public function __construct()
    {
        // Set the configuration.
        $this->sms = new SMS();
    }

    public function message($text)
    {
        $this->sms->message = $text;
        return $this;
    }

    public function to($number)
    {
        $this->sms->to = $number;
        return $this;
    }

    public function from($who)
    {
        $this->sms->from = $who;
        return $this;
    }

    public function go()
    {
        return $this->sms->go();
    }

    public function makeSMS($message, $to, $from)
    {
        return new SMS($message, $to, $from);
    }

    public function send(SMS $sms)
    {
        return $sms->go();
    }
}