<?php

use Nitier\Core\Bootstrap\Config;
use Psr\Container\ContainerInterface;
use Nitier\Extension\Memcached\MemcachedClient;

return [
    MemcachedClient::class => static function (ContainerInterface $container): MemcachedClient {
        return new MemcachedClient(Config::get('memcached'));
    }

];