<?php

namespace Nesiasoft\Core\Tests\Phones;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Phones\PhonesServiceProvider;

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
    }

    protected function getPackageProviders($app)
    {
        return [
            PhonesServiceProvider::class,
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
        include_once __DIR__.'/../../database/migrations/create_phones_table.php.stub';

        (new \CreatePhonesTable())->up();

        $this->app['db']
                ->connection()
                ->getSchemaBuilder()
                ->create('suppliers', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->timestamps();
                });
    }
}
