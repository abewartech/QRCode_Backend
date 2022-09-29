<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class lupaabsen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lupaabsen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lupa Absen';

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
        try {
            Http::post('https://nr.cakrawala.id/sendnotiflupaabsen');
        } catch (\Exception$e) {
        }
        return 0;
    }
}
