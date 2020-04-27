<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

return [
    [
        'id'         => 1,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make("12345678"),
        'username'   => 'luka.vavetic',
        'email'      => 'luka.vavetic@gmail.com',
        'firstname'  => 'Luka',
        'lastname'   => 'Vavetić',
        'role_id'    => 1
    ],

    [
        'id'         => 2,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make("12345678"),
        'username'   => 'frano.sasvari',
        'email'      => 'frano.sasvari@gmail.com',
        'firstname'  => 'Frano',
        'lastname'   => 'Šašvari',
        'role_id'    => 1
    ],

    [
        'id'         => 3,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make("12345678"),
        'username'   => 'matija.vavetic',
        'email'      => 'matija.vavetic@gmail.com',
        'firstname'  => 'Matija',
        'lastname'   => 'Vavetić',
        'role_id'    => 1
    ],
];
