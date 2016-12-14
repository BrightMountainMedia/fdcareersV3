<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\PositionsPublish::class,
        \App\Console\Commands\PositionsDueDate::class,
        \App\Console\Commands\PositionsReminder::class,
        // \App\Console\Commands\SendIntro::class,
        \App\Console\Commands\RenewSubscriptionReminder::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $filePath = '/schedule.log';

        $schedule->command('positions:publish')
                 ->everyMinute()
                 ->appendOutputTo($filePath);

        $schedule->command('positions:duedate')
                 ->dailyAt('8:30')
                 ->appendOutputTo($filePath)
                 ->emailOutputTo('mstoffer@brightmountainmedia.com');

        $schedule->command('subscription:reminder')
                 ->appendOutputTo($filePath)
                 ->dailyAt('10:00')
                 ->emailOutputTo('mstoffer@brightmountainmedia.com');

        $schedule->command('positions:reminder')
                 ->monthlyOn(2, '9:00')
                 ->appendOutputTo($filePath)
                 ->emailOutputTo('mstoffer@brightmountainmedia.com');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
