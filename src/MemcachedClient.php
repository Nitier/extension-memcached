<?php

declare(strict_types=1);

namespace Nitier\Extension\Memcached;

use Nitier\Core\Interface\CacheInterface;

class MemcachedClient implements CacheInterface
{
    private ?\Memcached $memcached = null;

    /**
     * MemcachedClient constructor.
     * @param array<string, mixed> $config
     */
    public function __construct(array $config)
    {
        if ($this->connected()) {
            $this->disconnect();
        }
        $this->memcached = new \Memcached();
        $host = $config['host'] ?? 'localhost';
        $port = $config['port'] ?? 11211;
        $this->memcached->addServer($host, (int) $port);
    }

    private function disconnect(): void
    {
        $this->memcached->quit();
        $this->memcached = null;
    }

    private function connected(): bool
    {
        if ($this->memcached === null) {
            return false;
        }
        return $this->memcached->getVersion() !== false;
    }

    public function get(string $key): mixed
    {
        return $this->connected() ? $this->memcached->get($key) : null;
    }

    public function set(string $key, mixed $value, int $expires = 3600): bool
    {
        return $this->connected() && $this->memcached->set($key, $value, $expires);
    }

    public function delete(string $key): bool
    {
        return $this->connected() && $this->memcached->delete($key);
    }
}
