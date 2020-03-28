<?php

namespace Nesiasoft\Core\Tests\Comments;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Schema\Blueprint;
use Nesiasoft\Core\Comments\CommentsServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations(['--database' => 'sqlite']);

        $this->setUpDatabase();
        $this->createUser();
    }

    protected function getPackageProviders($app)
    {
        return [
            CommentsServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('auth.providers.users.model', User::class);
        
        $app['config']->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    protected function setUpDatabase()
    {
        include_once(__DIR__ . '/../../database/migrations/create_comments_table.php.stub');

        (new \CreateCommentsTable())->up();

        $this->app['db']->connection()->getSchemaBuilder()->create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->timestamps();
        });
    }

    protected function createUser()
    {
        User::forceCreate([
            'name' => 'User',
            'email' => 'user@email.com',
            'password' => 'test'
        ]);
    }

}