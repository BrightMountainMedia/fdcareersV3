<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	['id' => 1, 'first_name' => 'Michael', 'last_name' => 'Stoffer', 'email' => 'mstoffer@brightmountainmedia.com', 'password' => bcrypt('password'), 'photo_url' => '/storage/profiles/a3ac58a063161fd7e915136bc8f42ebf.jpeg', 'trial_ends_at' => Carbon::now(), 'last_read_announcements_at' => Carbon::now(), 'app_notification' => 1, 'email_notification' => 1, 'sms_notification' => 0, 'notification_states' => json_encode(array('FL', 'IN')), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        	['id' => 2, 'first_name' => 'Susan', 'last_name' => 'Manwaring', 'email' => 'susan@brightmountainmedia.com', 'password' => bcrypt('password'), 'photo_url' => '/storage/profiles/c2299915179615455592f4b6d949c82a.jpeg', 'trial_ends_at' => Carbon::now(), 'last_read_announcements_at' => Carbon::now(), 'app_notification' => 1, 'email_notification' => 1, 'sms_notification' => 0, 'notification_states' => json_encode(array('FL')), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['id' => 3, 'first_name' => 'Courtney', 'last_name' => 'Wolfe', 'email' => 'courtney@brightmountainmedia.com', 'password' => bcrypt('password'), 'photo_url' => '/storage/profiles/3daba134a3ecf6878dc69c24de2990a2.jpeg', 'trial_ends_at' => Carbon::now(), 'last_read_announcements_at' => Carbon::now(), 'app_notification' => 1, 'email_notification' => 1, 'sms_notification' => 0, 'notification_states' => json_encode(array('FL')), 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);
        factory(App\User::class, 47)->create();
    }
}
