<?php
/** Not the best idea to keep passwords and keys here, but OK for test projects */
$settings = [
    'mysql' => [
        'username'  => 'testappuser',
        'password'  => 'testapppassword',
        'database'  => 'testapp',
        'salt'      => 'Asm0193cmqo139jcnn!@dqawdq1'
    ],
    'libraries' => [
        'url' => 'https://libraries.io/api/search',
        'api_key' => '4ee2025aa68dc1594949864a7c698907',
        'per_page' => 10,
        'default_sort' => 'created_at'
    ]
];

define("SETTINGS", $settings);