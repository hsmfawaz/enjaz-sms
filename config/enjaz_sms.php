<?php

return [
    'endpoint' => 'https://www.enjazsms.com/api/sendsms.php',
    'username' => env('ENJAZ_USERNAME', ''),
    'password' => env('ENJAZ_PASSWORD', ''),
    'sender' => env('ENJAZ_SENDER', ''),
    'return' => 'full',
    'unicode' => 'e',
];