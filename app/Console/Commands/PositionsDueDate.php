<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Laravel\Spark\Spark;
use App\User;
use App\Position;
use App\Notifications\DueDateEmail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class PositionsDueDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'positions:duedate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder that these positions were due on yesterdays date.';

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
        $yesterday = Carbon::yesterday();
        $positions = Position::where('duedate', $yesterday)->published()->active()->get();

        if ( count($positions) > 0 ) {
            $users = User::whereIn('email', Spark::$developers)->get();
            foreach ($users as $user) {
                $user->notify(new DueDateEmail($user, $positions));
            }
        }
    }
}
