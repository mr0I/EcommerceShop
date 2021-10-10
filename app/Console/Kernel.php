<?php

namespace App\Console;

use App\wishlist;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Compare;
use Carbon\Carbon;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $file_path = public_path() . '\logs\schuldeLogs.txt';
        $schedule->call(function () {
            $compares = Compare::all();
            $wishes = wishlist::all();
            $now = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());

            foreach ($compares as $compare){
                $then = Carbon::createFromFormat('Y-m-d H:s:i', $compare->updated_at);
                $diff = $then->diffInDays($now);
                if ($diff>=3) $compare->delete();
            }
            foreach ($wishes as $wish){
                $then = Carbon::createFromFormat('Y-m-d H:s:i', $wish->updated_at);
                $diff = $then->diffInDays($now);
                if ($diff>=3) $wish->delete();
            }
        })->daily()->appendOutputTo($file_path);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
