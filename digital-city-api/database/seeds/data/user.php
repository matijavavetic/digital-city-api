<?php

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

return [
    [
        'id'         => 1,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make(bin2hex(random_bytes(10))),
        'username'   => 'luka.vavetic',
        'email'      => 'luka.vavetic@dc.com',
        'firstname'  => 'Luka',
        'lastname'   => 'Vavetić',
        'role_id'    => 1
    ],

    [
        'id'         => 2,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make(bin2hex(random_bytes(10))),
        'username'   => 'frano.sasvari',
        'email'      => 'frano.sasvari@dc.com',
        'firstname'  => 'Frano',
        'lastname'   => 'Šašvari',
        'role_id'    => 1
    ],

    [
        'id'         => 3,
        'identifier' => Uuid::uuid4()->getHex(),
        'password'   => Hash::make(bin2hex(random_bytes(10))),
        'username'   => 'matija.vavetic',
        'email'      => 'matija.vavetic@dc.com',
        'firstname'  => 'Matija',
        'lastname'   => 'Vavetić',
        'role_id'    => 1
    ],
];
