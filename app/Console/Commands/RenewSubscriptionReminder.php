<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\User;
use App\Notifications\SubscriptionRenewal;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class RenewSubscriptionReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'A reminder that the users subscription is coming up for renewal.';

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
        $subscriptions = DB::table('subscriptions')->whereBetween('ends_at', [Carbon::today(), Carbon::now()->addMonth()])->where('reminder_sent', 0)->get();
        if ( count($subscriptions) > 0 ) {
            foreach ( $subscriptions as $subscription ) {
                $user = User::find($subscription->user_id);
                $user->notify(new SubscriptionRenewal($user));
                $subscription->reminder_sent = 1;
                $subscription->save();
            }
        }
    }
}
