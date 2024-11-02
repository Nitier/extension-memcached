<?php

declare(strict_types=1);

namespace Nitier\Route;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Nitier\Core\Http\Response\HtmlResponse;
use Nitier\Core\Util\Cache;

class GetRequest implements RequestHandlerInterface
{
    public function __construct(
        private Cache $cache
    ) {
    }
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->cache->set('test', 'Hello World');
        return new HtmlResponse($this->cache->get('test') ?: 'memcached not connected');
    }
}
