<?php

return [

    'database' => [
        'driver' => 'sqlite',
        'database' => base_path('database/database.sqlite'),

        // 'driver' => 'mysql',
        // 'host' => '127.0.0.1',
        // 'port' => 3306,
        // 'dbname' => 'db_name',
        // 'user' => 'root',
        // 'password' => '',
        // 'charset' => 'utfm8mb4'

    ],

    'security' => [
        'first_key' => env('ENCRYPT_FIRST_KEY', base64_encode('Raimundinho')),
        'second_key' => env('ENCRYPT_SECOND_KEY', base64_decode('Raimundinho123')),
    ],
];
