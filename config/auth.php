<?php
return [

    'multi' => [
        'admin' => [
            'driver' => 'eloquent',
            'model' => 'App\Admin',
        ],
        'user' => [
            'driver' => 'eloquent',
            'model' => 'App\User',
        ]
    ],

    'password' => [
            'email' => 'emails.password',
            'table' => 'password_resets',
            'expire' => 60,
        ],

];