<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'Prophysio Huejutla'),
        'short_name' => 'Prophysio',
        'description' => 'Agenda tus citas desde la aplicacion',
        'start_url' => 'https://prophysio.azurewebsites.net/',
        'id' => 'https://prophysio.azurewebsites.net/',
        'background_color' => '#C7F7F7',
        'theme_color' => '#C7F7F7', //E20089
        'display' => 'fullscreen',
        'orientation'=> 'any',
        'status_bar'=> 'black',
        'scope' => './',
        'lang' => 'es-MX',
        'maintainer' => 'Angel Yahir Hernández Castillo',
        'contact' => 'yahirgamerpvz@gmail.com',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72.png',
                'purpose' => 'any maskable'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96.png',
                'purpose' => 'any maskable'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128.png',
                'purpose' => 'any maskable'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144.png',
                'purpose' => 'any maskable'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152.png',
                'purpose' => 'any maskable'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192.png',
                'purpose' => 'any maskable'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384.png',
                'purpose' => 'any maskable'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512.png',
                'purpose' => 'any maskable'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Mis citas',
                'description' => 'Acceder a las citas programadas',
                'url' => '/inicio/mis-citas'
            ]
        ],
        'custom' => []
    ]
];
