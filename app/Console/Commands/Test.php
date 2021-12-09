<?php

namespace App\Console\Commands;

use App\Libraries\ErrorCode;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:Test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Test';

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
        // $res = app()->environment('local');
        // $res = config('app.log');
        //
        // dump($res ?? '$res === null');

        $ba


        return Command::SUCCESS;
    }
}
