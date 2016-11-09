<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\User;
use App\Position;
use App\Department;
use App\Notifications\PositionPublishedAPP;
use App\Notifications\PositionPublishedMail;
use App\Notifications\PositionPublishedSMS;
use Illuminate\Console\Command;

class PositionsPublish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'positions:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the positions that are scheduled for this moment';

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
        $seconds_before = Carbon::now()->subSeconds(30);
        $seconds_after = Carbon::now()->addSeconds(30);
        $positions = Position::where(function ($query) use ($seconds_before, $seconds_after) {
            $query->where('publish', '>=', $seconds_before);
            $query->where('publish', '<=', $seconds_after);
        })->inActive()->get();

        foreach ($positions as $position) {
            $position->active = 1;
            $position->save();

            $department = Department::find($position->department_id);
            $users = User::where('notification_states', 'like', '%'.$position->state.'%')->get();
            foreach ($users as $user) {
                if ( $user->subscribed() && $user->app_notification ) {
                    $user->notify(new PositionPublishedAPP($position));
                }
                if ( $user->subscribed() && $user->email_notification ) {
                    $user->notify(new PositionPublishedMail($user, $position, $department));
                }
                if ( $user->subscribed() && $user->sms_notification ) {
                    $user->notify(new PositionPublishedSMS($position));
                }
            }
        }
    }
}
