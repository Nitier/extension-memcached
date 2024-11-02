<?php

declare(strict_types=1);

use Nitier\Core\Bootstrap\Loader;

require dirname(__DIR__) . '/vendor/autoload.php';

http_response_code(500);

$app = Loader::load(dirname(__DIR__));

$app->run();