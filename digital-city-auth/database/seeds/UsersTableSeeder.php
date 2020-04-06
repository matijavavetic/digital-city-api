<?php

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $table = 'users';

        if ($this->truncate) {
            $this->database->connection($this->connection)->table($table)->truncate();
        }

        $rows = $this->fileSystem->getRequire(database_path('seeds/data/user.php'));

        $this->command->getOutput()->progressStart(count($rows));

        foreach ($rows as $row) {
            $data = [
                'id'         => $row['id'],
                'identifier' => $row['identifier'],
                'password'   => $row['password'],
                'email'      => $row['email'],
                'username'   => $row['username'],
                'firstname'  => $row['firstname'],
                'lastname'   => $row['lastname']
            ];

            if (! $this->database->connection($this->connection)->table($table)->where('id', $row['id'])->first()) {
                $this->database->connection($this->connection)->table($table)->insert($data);
            }
        }

        $this->command->getOutput()->progressFinish();
    }
}
