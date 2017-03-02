<?php
return [
    'database' => [
        'databasename'    => 'F19B1225',
        'username'        => 'F19B1225',
        'password'        => 'zfUhzq7utLGnAtTw',
        'connection'      => 'mysql:host=46.101.101.114',
        'options'         => [
            PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'remember' => [
        'cookie_name'     => 'hash',
        'cookie_expiry'   => 2592000
    ],
    'session' => [
        'session_name'    => 'user',
        'token_name'      => 'token'
    ],
    'hashing' => [
        'cost'    => '12'
    ]
];

