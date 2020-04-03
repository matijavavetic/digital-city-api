<?php

use src\Data\Entities\User;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $this->database->table('users')->insert([
            'username' => 'luka.vavetic',
            'uuid' => '213-2132',
            'email' => 'lvavetic@digitalcity.hr',
            'password' => bcrypt('1231231'),
        ]);
        $this->database->table('users')->insert([
            'username' => 'matija.vavetic',
            'uuid' => '213-2123121',
            'email' => 'mvavetic@digitalcity.hr',
            'password' => bcrypt('1231223'),
        ]);
        $this->database->table('users')->insert([
            'username' => 'frano.sasvari',
            'uuid' => '213-2132122222',
            'email' => 'fsasvari@digitalcity.hr',
            'password' => bcrypt('421214'),
        ]);
    }
}
