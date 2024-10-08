<?php

declare(strict_types=1);

use function Hyperf\Support\env;

/**
 * This file is part of the extension library for Hyperf.
 *
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [
    'root_view' => 'inertia',
    'public_path_prefix' => __DIR__ . '/../../storage/public',
    'asset_public_path' => env('DOMAIN_API') . '/public',
    'skip_url_prefix' => empty(env('INERTIA_SKIP_URL_PREFIX')) ? [] : explode(',', env('INERTIA_SKIP_URL_PREFIX')),
    'no_skip_extra_path' => empty(env('INERTIA_NO_SKIP_EXTRA_PATH')) ? [] : explode(',', env('INERTIA_NO_SKIP_EXTRA_PATH')),
    'is_secure' => env('INERTIA_IS_SECURE', true) !== false,

    
    /*
    |--------------------------------------------------------------------------
    | Server Side Rendering
    |--------------------------------------------------------------------------
    |
    | These options configures if and how Inertia uses Server Side Rendering
    | to pre-render the initial visits made to your application's pages.
    |
    | You can specify a custom SSR bundle path, or omit it to let Inertia
    | try and automatically detect it for you.
    |
    | Do note that enabling these options will NOT automatically make SSR work,
    | as a separate rendering service needs to be available. To learn more,
    | please visit https://inertiajs.com/server-side-rendering
    |
    */

    'ssr' => [
        'enabled' => env('INERTIA_SSR_ENABLED', false),
        'url' => env('INERTIA_SSR_URL', 'http://127.0.0.1:13714'),
        // 'bundle' => BASE_PATH . '/bootstrap/ssr/ssr.mjs',
    ],

    /*
    |--------------------------------------------------------------------------
    | Testing
    |--------------------------------------------------------------------------
    |
    | The values described here are used to locate Inertia components on the
    | filesystem. For instance, when using `assertInertia`, the assertion
    | attempts to locate the component as a file relative to any of the
    | paths AND with any of the extensions specified here.
    |
    */

    'testing' => [
        'ensure_pages_exist' => false,

        'page_paths' => [
            BASE_PATH . '/storage/inertia/js/Pages',
        ],

        'page_extensions' => [
            'js',
            'jsx',
            'svelte',
            'ts',
            'tsx',
            'vue',
        ],
    ],
];
