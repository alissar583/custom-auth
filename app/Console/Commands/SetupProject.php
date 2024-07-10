<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SetupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets up the project by running migrations and seeders';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info('Starting project setup...');

        $this->call('migrate:fresh');
        $this->call('db:seed');
        $this->call('serve');

        $this->info('Project setup completed successfully.');
    }
}
