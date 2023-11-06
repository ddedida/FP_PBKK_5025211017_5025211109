<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bjir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test untuk mencoba Scheduling';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return $this->info($this->description);
    }
}
