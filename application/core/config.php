<?php
return [
    'database' => [
        'databasename'    => 'c2F19B1225',
        'username'        => 'c2F19B1225',
        'password'        => 'zfUhzq7utLGnAtTw',
        'connection'      => 'mysql:host=207.154.202.238',
        'options'         => [
            PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION
        ]
    ],
    'mailer' => [
        'host'            => 'mail.dom.tld',
        'smtpauth'        => true,
        'username'        => 'user',
        'password'        => 'pass',
        'smtpsecure'      => 'tls',
        'port'            => 587,
        'ishtml'          => true,
        'setfrom'         => 'sender@dom.tld',
        'addreplyto'      => 'sender@dom.tid'
    ],
    'cookie' => [
        'secure'     => false,
        'httponly'   => false
    ],
    'auth' => [
        'cookie_name'     => 'user_r',
        'cookie_expiry'   => (86400 * 30)
    ],
    'session' => [
        'session_name'    => 'user',
        'token_name'      => 'token'
    ],
    'hashing' => [
        'cost'    => '12'
    ]
];