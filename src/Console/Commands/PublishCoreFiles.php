<?php

namespace Nesiasoft\Core\Console\Commands;

use Illuminate\Console\Command;

class PublishCoreFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'core:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish Core\'s files';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->publishCommentsFiles();
        $this->publishDescriptionsFiles();
        $this->publishEmailsFiles();
        $this->publishNotesFiles();
    }

    /**
     * Publish vendor files for entity: Comment.
     *
     * @return void
     */
    protected function publishCommentsFiles(): void
    {
        $this->call('vendor:publish', [
            '--tag'      => 'migrations',
            '--provider' => "Nesiasoft\Core\Comments\CommentsServiceProvider",
        ]);

        $this->call('vendor:publish', [
            '--tag'      => 'config',
            '--provider' => "Nesiasoft\Core\Comments\CommentsServiceProvider",
        ]);
    }

    /**
     * Publish vendor files for entity: Description.
     *
     * @return void
     */
    protected function publishDescriptionsFiles(): void
    {
        $this->call('vendor:publish', [
            '--tag'      => 'migrations',
            '--provider' => "Nesiasoft\Core\Descriptions\DescriptionsServiceProvider",
        ]);

        $this->call('vendor:publish', [
            '--tag'      => 'config',
            '--provider' => "Nesiasoft\Core\Descriptions\DescriptionsServiceProvider",
        ]);
    }

    /**
     * Publish vendor files for entity: Email.
     *
     * @return void
     */
    protected function publishEmailsFiles(): void
    {
        $this->call('vendor:publish', [
            '--tag'      => 'migrations',
            '--provider' => "Nesiasoft\Core\Emails\EmailsServiceProvider",
        ]);

        $this->call('vendor:publish', [
            '--tag'      => 'config',
            '--provider' => "Nesiasoft\Core\Emails\EmailsServiceProvider",
        ]);
    }

    /**
     * Publish vendor files for entity: Note.
     *
     * @return void
     */
    protected function publishNotesFiles(): void
    {
        $this->call('vendor:publish', [
            '--tag'      => 'migrations',
            '--provider' => "Nesiasoft\Core\Notes\NotesServiceProvider",
        ]);

        $this->call('vendor:publish', [
            '--tag'      => 'config',
            '--provider' => "Nesiasoft\Core\Notes\NotesServiceProvider",
        ]);
    }
}
