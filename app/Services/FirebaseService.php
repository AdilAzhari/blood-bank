<?php

namespace App\Services;

use GuzzleHttp\Client;

class FirebaseService
{
    protected $baseUrl = 'https://fcm.googleapis.com/fcm/send';

    protected $serverKey;

    public function __construct()
    {
        $this->serverKey = config('firebase.server_key');
    }

    public function sendNotification($tokens, $title, $body, $data = [])
    {
        $client = new Client;

        $payload = [
            'registration_ids' => $tokens,
            'notification' => [
                'title' => $title,
                'body' => $body,
                'sound' => 'default',
            ],
            'data' => $data,
            'priority' => 'high',
        ];

        $response = $client->post($this->baseUrl, [
            'headers' => [
                'Authorization' => 'key='.$this->serverKey,
                'Content-Type' => 'application/json',
            ],
            'json' => $payload,
        ]);

        return json_decode($response->getBody(), true);
    }
}
