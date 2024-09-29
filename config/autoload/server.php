<?php

declare(strict_types=1);

use Swoole\Constant;
use Hyperf\Server\Event;
use Hyperf\Server\Server;
use Hyperf\Support\System;

return [
    'mode' => SWOOLE_PROCESS,
    'servers' => [
        [
            'name' => 'http',
            'type' => Server::SERVER_HTTP,
            'host' => '0.0.0.0',
            'port' => 9501,
            'sock_type' => SWOOLE_SOCK_TCP,
            'callbacks' => [
                Event::ON_REQUEST => [Hyperf\HttpServer\Server::class, 'onRequest'],
            ],
            'options' => [
                // Whether to enable request lifecycle event
                'enable_request_lifecycle' => false,
            ],
        ],
    ],
    'settings' => [
        Constant::OPTION_ENABLE_COROUTINE => true,
        Constant::OPTION_WORKER_NUM => swoole_cpu_num(),
        Constant::OPTION_PID_FILE => BASE_PATH . '/runtime/hyperf.pid',
        Constant::OPTION_OPEN_TCP_NODELAY => true,
        Constant::OPTION_MAX_COROUTINE => 100000,
        Constant::OPTION_OPEN_HTTP2_PROTOCOL => true,
        Constant::OPTION_MAX_REQUEST => 100000,
        Constant::OPTION_SOCKET_BUFFER_SIZE => 2 * 1024 * 1024,
        Constant::OPTION_BUFFER_OUTPUT_SIZE => 2 * 1024 * 1024,
        Constant::OPTION_DOCUMENT_ROOT => BASE_PATH . '/storage',
        Constant::OPTION_STATIC_HANDLER_LOCATIONS => ['/public'],
        Constant::OPTION_ENABLE_STATIC_HANDLER => true,
        Constant::OPTION_COMPRESSION_LEVEL => 6,
        Constant::OPTION_HTTP_COMPRESSION => true,
        Constant::OPTION_HTTP_COMPRESSION_LEVEL => 6,

        // Number of Task Workers, configure the appropriate number based on your server configuration.
        'task_worker_num' => System::getCpuCoresNum(),
        // Because `Task` mainly deals with methods that cannot be coroutined,
        // it is recommended to set `false` here to avoid data confusion under coroutines.
        'task_enable_coroutine' => false,
    ],
    'callbacks' => [
        Event::ON_WORKER_START => [Hyperf\Framework\Bootstrap\WorkerStartCallback::class, 'onWorkerStart'],
        Event::ON_PIPE_MESSAGE => [Hyperf\Framework\Bootstrap\PipeMessageCallback::class, 'onPipeMessage'],
        Event::ON_WORKER_EXIT => [Hyperf\Framework\Bootstrap\WorkerExitCallback::class, 'onWorkerExit'],

        // Task callbacks
        Event::ON_TASK => [Hyperf\Framework\Bootstrap\TaskCallback::class, 'onTask'],
        Event::ON_FINISH => [Hyperf\Framework\Bootstrap\FinishCallback::class, 'onFinish'],
    ],
];
