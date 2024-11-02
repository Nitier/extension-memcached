<?php
use Nitier\Core\Bootstrap\Env;
use Nitier\Extension\Memcached\MemcachedClient;

return [
    'config' => [
        'cache' => [
            'driver' => MemcachedClient::class,
        ],
        'memcached' => [
            'host' => Env::get('MEMCACHED_HOST', 'localhost'),
            'port' => Env::get('MEMCACHED_PORT', 11211),
        ]

    ]  
];