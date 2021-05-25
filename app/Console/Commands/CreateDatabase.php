<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CreateDatabase extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'serempre:create-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migraciones y Seeds. Prueba Laravel serempre';

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
            Artisan::call('migrate:refresh', [
                '--seed' => true,
            ]);
            $this->info('Base de datos migrada');
        }catch (\Exception $e){
            $this->error($e->getMessage());
        }
    }
}
