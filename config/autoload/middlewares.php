<?php

declare(strict_types=1);

return [
    /**
     * The following http string corresponds to the value corresponding to the name attribute
     * of each server in config/autoload/server.php, which means that the corresponding middleware
     * configuration is only applied to the server.
     */
    'http' => [
        \Hyperf\Session\Middleware\SessionMiddleware::class,
        
        // Must be placed before validation middleware
        \App\Common\Middleware\HandleInertiaMiddleware::class,
        \Hyperf\Validation\Middleware\ValidationMiddleware::class,
    ],
];
