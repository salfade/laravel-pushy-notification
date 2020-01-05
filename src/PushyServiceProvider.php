<?php

namespace NotificationChannels\Fawzanm\Pushy;

use GuzzleHttp\Client;
use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\ServiceProvider;

class PushyServiceProvider extends ServiceProvider
{

    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('pushy', function ($app) {
                return new PushyChannel($app[Client::class], $this->app['config']['services.pushy.key']);
            });
        });
    }


}
