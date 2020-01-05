<?php

namespace Fawzanm\Pushy;

use GuzzleHttp\Client;
use Illuminate\Notifications\Notification;

class PushyChannel
{
    /**
     * @const The API URL for Firebase
     */
    const API_URI = 'https://api.pushy.me/push';
    /**
     * @var Client
     */
    private $client;
    /**
     * @var string
     */
    private $apiKey;

    /**
     * @param Client $client
     * @param $apiKey
     */
    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     * @param Notification $notification
     * @return mixed|void
     */
    public function send($notifiable, Notification $notification)
    {

        $message = $notification->toPushy($notifiable);

        if (is_null($message->getTo())) {
            if (!$to = $notifiable->routeNotificationFor('pushy', $notification)) {
                return;
            }
            $message->to($to);
        }

        $payload = [
            "to" => $message->getTo(),
            "data" => $message->getData(),
            "notification" => $message->getNotification()
        ];

        $response = $this->client->post(
            self::API_URI . '?api_key=' . $this->apiKey,
            [
                'json' => $payload
            ]
        );

        return \GuzzleHttp\json_decode($response->getBody(), true);

    }



}
