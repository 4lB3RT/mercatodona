<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Mercadona\Category\Infrastructure\Commands\SaveCategoriesFromApiArtisanCommand;
use Mercadona\Product\Infrastructure\Commands\UpdateProductsFromApiArtisanCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        SaveCategoriesFromApiArtisanCommand::class,
        UpdateProductsFromApiArtisanCommand::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('get-categories')->daily()->environments(['staging', 'production']);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/../../src/Category/Infrastructure/Commands');

        require base_path('routes/console.php');
    }
}
