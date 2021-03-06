<?php

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $table = 'role';

        if ($this->truncate) {
            $this->database->connection($this->connection)->table($table)->truncate();
        }

        $rows = $this->fileSystem->getRequire(database_path('seeds/data/role.php'));

        $this->command->getOutput()->progressStart(count($rows));

        foreach ($rows as $row) {
            $data = [
                'identifier' => $row['identifier'],
                'name'       => $row['name'],
            ];

            if (! $this->database->connection($this->connection)->table($table)->where('id', $row['id'])->first()) {
                $this->database->connection($this->connection)->table($table)->insert($data);
            }
        }

        $this->command->getOutput()->progressFinish();
    }
}