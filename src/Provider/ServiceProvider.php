<?php

declare(strict_types=1);

namespace Nitier\Extension\Memcached\Provider;

use Nitier\Core\Util\FileSystem;
use Nitier\Core\Interface\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public static function setup(): string
    {
        return FileSystem::genPath(__DIR__, '..', '..', 'config');
    }
}
