<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TokenHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'JWT';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $ch = new \App\Tools\CurlHelper("", []);
        echo $ch->makeJWT();
        return 0;
    }
}
