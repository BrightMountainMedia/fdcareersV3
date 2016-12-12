<?php

namespace App\Console\Commands;

use App\User;
use App\Notifications\Introduction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class SendIntro extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'introduction:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an Introduction email.';

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
        $subscriptions = DB::table('subscriptions')->get();
        if ( count($subscriptions) > 0 ) {
            foreach ( $subscriptions as $subscription ) {
                $user = User::find($subscription->user_id);
                $user->notify(new Introduction($user));
            }
        }
    }
}
