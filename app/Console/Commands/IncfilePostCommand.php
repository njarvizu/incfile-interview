<?php

namespace App\Console\Commands;

use App\Jobs\IncFilePost;
use Illuminate\Console\Command;

class IncfilePostCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'incfile:fakerpost';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command run a Incfile faker post Job';

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
        IncFilePost::dispatch();
        return 0;
    }
}
