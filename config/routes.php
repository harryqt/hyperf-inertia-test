<?php

declare(strict_types=1);

use Hyperf\HttpServer\Router\Router;

Router::get('/test1', [App\Controller\IndexController::class, 'test1']);
Router::get('/test2', [App\Controller\IndexController::class, 'test2']);

Router::get('/favicon.ico', function () {
    return '';
});
