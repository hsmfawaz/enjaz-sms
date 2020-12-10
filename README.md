# enjaz-sms

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Travis](https://img.shields.io/travis/hsmfawaz/enjaz-sms.svg?style=flat-square)]()
[![Total Downloads](https://img.shields.io/packagist/dt/hsmfawaz/enjaz-sms.svg?style=flat-square)](https://packagist.org/packages/hsmfawaz/enjaz-sms)

## Install

```bash
composer require hsmfawaz/enjaz-sms
```

## Configuration

Follow the following instructions to install the package successfully

### .env

```
ENJAZ_USERNAME='XXX'
ENJAZ_PASSWORD='XXX'
ENJAZ_SENDER='XXX'
```

### if you want to publish the config

```
php artisan vendor:publish --provider="HsmFawaz\EnjazSms\EnjazSmsServiceProvider" 
--tag="config"
```

## Usage

You can use the class to send directly

```PHP
use \Hsmfawaz\EnjazSms\EnjazSms;

$client = new EnjazSms();
$result = $client->to(['+9665XXXXXXX','9665XXXXXXX'])->send('Your message here');
//you will get array from parsed request body
```

or you can use the channel for notifications support

```PHP
//Example app/Notifications/RecoveryCodeNotification.php
use \Hsmfawaz\EnjazSms\EnjazSmsChannel;

public function via($notifiable)
    {
        return [EnjazSmsChannel::class];
    }

public function toEnjazSms($notifiable)
    {
        return [
            'phone' => 'phone number',
            'body' =>'message',
        ];
    }
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security-related issues, please email hsm.fawaz@gmail.com instead of using the
issue tracker.

## License

The MIT License (MIT). Please see [License File](/LICENSE.md) for more information.