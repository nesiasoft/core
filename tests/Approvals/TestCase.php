<?php

namespace Nesiasoft\Core\Tests\Approvals;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Approvals\ApprovalsServiceProvider;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadLaravelMigrations();

        $this->setUpDatabase();
        $this->createUser();
    }

    protected function getPackageProviders($app)
    {
        return [
            ApprovalsServiceProvider::class,
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
        include_once __DIR__.'/../../database/migrations/create_approvals_table.php.stub';

        (new \CreateApprovalsTable())->up();

        $this->app['db']
                ->connection()
                ->getSchemaBuilder()
                ->create('documents', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('number');
                    $table->timestamps();
                });
    }

    protected function createUser()
    {
        User::forceCreate([
            'name' => 'User 01',
            'email' => 'user01@example.com',
            'password' => 'p4ssw0rd',
        ]);
    }
}
