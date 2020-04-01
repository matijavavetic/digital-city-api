<?php

use Illuminate\Database\Seeder as BaseSeeder;
use Illuminate\Config\Repository as Config;
use Illuminate\Filesystem\Filesystem as Filesystem;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Database\DatabaseManager as Database;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Events\StatementPrepared;

class Seeder extends BaseSeeder
{
    /**
     * The config instance
     *
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    /**
     * The filesystem factory (storage) instance
     *
     * @var \Illuminate\Contracts\Filesystem\Factory
     */
    protected $storage;

    /**
     * The filesystem instance
     *
     * @var \Illuminate\Filesystem\Filesystem
     */
    protected $fileSystem;

    /**
     * The database instance
     *
     * @var \Illuminate\Database\DatabaseManager
     */
    protected $database;

    /**
     * The hash instance
     *
     * @var \Illuminate\Contracts\Hashing\Hasher
     */
    protected $hash;

    /**
     * List of available locales
     *
     * @var array
     */
    protected $locales = [];

    /**
     * The name of current active connection
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * Truncate data before inserting
     *
     * @var bool
     */
    protected $truncate = true;

    /**
     * Set the rows limit
     *
     * @var int
     */
    protected $limit = 1000;

    /**
     * Files to leave when cleaning directory
     *
     * @var array
     */
    protected $filesLeave = [
        '.gitignore', 'thumb'
    ];

    /**
     * Create new database seeder instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->config = app(Config::class);
        $this->fileSystem = app(Filesystem::class);
        $this->storage = app(Storage::class);
        $this->database = app(Database::class);
        $this->hash = app(Hash::class);

        $this->locales = $this->config->get('app.locales');

        $this->database->connection($this->connection)->statement('SET FOREIGN_KEY_CHECKS = 0');

        Event::listen(StatementPrepared::class, function ($event) {
            $event->statement->setFetchMode(PDO::FETCH_ASSOC);
        });
    }

    /**
     * Destroy database seeder instance
     *
     * @return void
     */
    public function __destruct()
    {
        $this->database->statement('SET FOREIGN_KEY_CHECKS = 1');
    }

    /**
     * Run the database seeds
     *
     * @return void
     */
    public function run()
    {
        //
    }

    /**
     * Empty files from directory
     *
     * @param  string  $path
     * @return void
     */
    protected function emptyDirectory($path)
    {
        if ($this->truncate) {
            foreach ($this->storage->disk('public')->files($path) as $file) {
                if (! in_array($this->fileSystem->basename($file), $this->filesLeave) ) {
                    $this->storage->disk('public')->delete($file);
                }
            }
        }
    }
}