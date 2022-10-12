<?php

namespace App\Console\Commands;

use App\Tools\LogChain;
use Illuminate\Console\Command;

class SmartContractDeploy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deploy:smartContract';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deploy smart contract to the blockchain';

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
        $logChain = new LogChain();
        return $logChain->deploy();
    }
}
