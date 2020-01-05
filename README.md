# Laravel Pushy Notification

[![Latest Version on Packagist](https://img.shields.io/packagist/v/laravel-notification-channels/:package_name.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/:package_name)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel-notification-channels/:package_name.svg?style=flat-square)](https://packagist.org/packages/laravel-notification-channels/:package_name)

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
* Add an entry in your `config/services.php` and an entry in `.env` file as `SECRET_API_KEY=your_api_key`. You can replace the `default-api-key` with your key if you are not using an environment file. 
 
 ```
'pushy' => [ 'key' => env('SECRET_API_KEY','default-api-key') ]
````


### Setting up the Pushy service

[Pushy](https://pushy.me/docs/) has a great documentation you can follow. Be sure to check it out. 
## Usage

Some code examples, make it clear how to use the package

### Available Message methods

A list of all available options

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
