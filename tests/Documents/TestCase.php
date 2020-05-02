<?php

namespace Nesiasoft\Core\Tests\Documents;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Auth\User;
use Nesiasoft\Core\Documents\DocumentsServiceProvider;

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
            DocumentsServiceProvider::class,
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
        include_once __DIR__.'/../../database/migrations/create_documents_table.php.stub';

        (new \CreateDocumentsTable())->up();

        $this->app['db']
                ->connection()
                ->getSchemaBuilder()
                ->create('employees', function (Blueprint $table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->timestamps();
                });
    }
}
