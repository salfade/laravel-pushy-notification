# Laravel Pushy Notification

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/:package_name.svg?style=flat-square)](https://packagist.org/packages/fawzanm/laravel-pushy-notification)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/:package_name.svg?style=flat-square)](https://packagist.org/packages/fawzanm/laravel-pushy-notification)

This package makes it easy to send notifications using [Pushy](https://pushy.me/docs/) with Laravel 5.5+ and 6.0

Send push notifications to devices by hitting up [Pushy](https://pushy.me/docs/) REST API from your laravel app.


## Contents

- [Installation](#installation)
	- [Setting up the Pushy service](#setting-up-the-Pushy-service)
- [Usage](#usage)
	- [Available Message methods](#available-message-methods)
- [Changelog](#changelog)
- [Testing](#testing)
- [Security](#security)
- [Contributing](#contributing)
- [Credits](#credits)
- [License](#license)


## Installation
```
composer require fawzanm/laravel-pushy-notification
```

Manually registering the service provider?
```
// config/app.php
'providers' => [
    ...
        \Fawzanm\Pushy\PushyServiceProvider::class,
    ...
];
```

* Obtain a SECRET_API_KEY from [Pushy](https://pushy.me/docs/) by creating an app
* Add an entry in your `config/services.php` and replace `SECRET_API_KEY` with your key
 
 ```
'pushy' => [ 'key' => 'SECRET_API_KEY' ]
````


### Setting up the Pushy service

[Pushy](https://pushy.me/docs/) has a great documentation you can follow. Be sure to check it out. 
## Example Usage

Use Artisan to create a notification:

```bash
php artisan make:notification SomeNotification
```

Return `[pushy]` in the `public function via($notifiable)` method of your notification:

```php
public function via($notifiable)
{
    return ['pushy'];
}
```

Add the method `public function toFcm($notifiable)` to your notification, and return an instance of `FcmMessage`: 

```php
use Fawzanm\Pushy\PushyMessage;
...

public function toFcm($notifiable) 
{
    $message = new PushyMessage();
    $message->content([
               'body' => 'Hello, World..',
               'badge' => 1,
               'sound' => 'ping.aiff'
           ])->data([
               'type' => 'notification',
           ]);
    return $message;
}
```

When sending to specific device, make sure your notifiable entity has `routeNotificationForPushy` method defined:
```php

   /**
     * Route notifications for the FCM channel.
     *
     * @param \Illuminate\Notifications\Notification $notification
     * @return string
     */
    public function routeNotificationForPushy($notification)
    {
        return $this->device_token;
    }
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email fawzanm@gmail.com instead of using the issue tracker.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Mohamed Fawzan](https://github.com/:author_username)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
