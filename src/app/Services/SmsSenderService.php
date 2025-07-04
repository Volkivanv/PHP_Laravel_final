<?php

namespace App\Services;
use Twilio\Rest\Client as TwilioClient;

class SmsSenderService implements SmsSenderInterface
{
    /**
     * Create a new class instance.
     */
    protected $client;
    public function __construct($sid, $token)
    {
        //
        $this->client = new TwilioClient($sid, $token);
    }

    public function send($message)
    {
        $this->client->messages->create(
            7778832873823,
            ['from' => 3123125434,
            'body' => 'qpsad;fjaslfdssdadf']
        );
    }
}
