<?php

namespace App\Console\Commands;

use App\Jobs\FetchWeatherReport;
use Illuminate\Console\Command;

class SyncReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch report data';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        FetchWeatherReport::dispatch();
        $this->info('Weather report sync process started in background!');
        echo Command::SUCCESS;
    }
}
