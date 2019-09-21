<?php

$database = [
    'database.connection' => [
        'driver' => 'mysql',
        'host' => 'mysql',
        'username' => 'homestead',
        'password' => 'secret',
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'lazy' => true,
        'options' => [
            PDO::MYSQL_ATTR_LOCAL_INFILE => true,
            PDO::ATTR_EMULATE_PREPARES => true,
        ]
    ]
];