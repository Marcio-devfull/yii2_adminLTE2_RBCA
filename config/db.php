<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host='.env('DATABASE_HOST').';dbname='.env('DATABASE_DATABASE').'',
    'username' => env('DATABASE_USER'),
    'password' => env('DATABASE_PASSWORD'),
    'charset' => 'utf8',
];
