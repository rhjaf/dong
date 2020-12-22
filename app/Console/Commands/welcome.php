<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class welcome extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'display:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Welcome message from Rohullah';

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
     * @return int
     */
    public function handle()
    {
        $this->info('Welcome to Laravel dongi');
    }
}
