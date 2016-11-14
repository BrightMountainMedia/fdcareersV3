<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Laravel\Spark\Spark;
use App\User;
use App\Position;
use App\Notifications\ReminderEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class PositionsReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'positions:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a monthly reminder to check recurring and untilFilled positions.';

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
     * @return mixed
     */
    public function handle()
    {
        $last_month_begin = Carbon::now()->subDays(3)->startOfMonth();
        $last_month_end = Carbon::now()->subDays(3)->endOfMonth();
        $positions = Position::where(function ($query) use ($last_month_begin, $last_month_end) {
            $query->where('publish', '>=', $last_month_begin);
            $query->where('publish', '<=', $last_month_end);
        })->whereIn('ending', ['continuous', 'untilFilled'])
          ->published()
          ->active()
          ->get();

        if ( count($positions) > 0 ) {
            $users = User::whereIn('email', Spark::$developers)->get();
            foreach ($users as $user) {
                $user->notify(new ReminderEmail($user, $positions));
            }
        }
    }
}
