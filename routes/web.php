<?php

use Carbon\Carbon;
use Laravel\Spark\Spark;
use Laravel\Spark\Contracts\Interactions\Subscribe;
use App\User;
use App\Position;
use App\FeaturedPosition;
use App\Department;
use App\Notifications\WelcomeEmail;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function() {
	// -------------------- Pages -------------------- //
	// Home
	Route::get('/', 'Pages\HomeController@index');
	
	// Search Jobs
	Route::get('/search', 'Pages\SearchController@index');
	
	// About Us
	Route::get('/about', 'Pages\AboutUsController@index');
	
	// FAQ
	Route::get('/faq', 'Pages\FAQController@index');
	
	// Contact Us
	Route::get('/contact', 'Pages\ContactUsController@index');
	Route::post('/contact/send', 'Pages\ContactUsController@send');

	// Privacy Policy
	Route::get('/privacy', 'Pages\PrivacyController@index');

	// -------------------- User Settings -------------------- //
	// User Dashboard
	Route::get('/dashboard', 'Settings\DashboardController@index');

	// Update Notification Details
	Route::put('/settings/notification/details', 'Settings\Profile\NotificationDetailsController@update');

	// Get User Count for Kiosk
	Route::get('/spark/kiosk/users', 'Kiosk\MetricsController@users');

	// Get Subscriber Count for Kiosk
	Route::get('/spark/kiosk/subscribers', 'Kiosk\MetricsController@subscribers');

	// ---------- Departments ---------- //
	// Show specific Department
	Route::get('/department/{id}', 'Pages\DepartmentController@show');

	// Show all Departments
	Route::get('/departments', 'Pages\DepartmentController@index');

	// Get all Departments that a specific user owns
	Route::get('/settings/user/{id}/departments', 'Settings\Department\SettingsDepartmentController@allUserDepartments');

	// Add Department
	Route::post('/settings/department/department_add', 'Settings\Department\SettingsDepartmentController@store');

	// Departments Search...
	Route::post('/settings/departments/department_search', 'Settings\Department\SettingsDepartmentController@performBasicSearch');

	// Show Department Profile
	Route::get('/settings/department/{id}/department_profile', 'Settings\Department\SettingsDepartmentController@show');

	// Update Department Photo
	Route::post('/settings/department/{id}/department_photo', 'Settings\Department\Profile\DepartmentPhotoController@store');
	
	// Update Department Information
	Route::put('/settings/department/{id}/department_update', 'Settings\Department\SettingsDepartmentController@update');

	// Get Department Count for Kiosk
	Route::get('/spark/kiosk/departments', 'Kiosk\MetricsController@departments');

	// ---------- Positions ---------- //
	// Show specific Position
	Route::get('/position/{id}', 'Pages\PositionController@show');

	// Store Saved Positions & Applied Positions
	Route::put('/position/{id}/save_to_dashboard', 'Settings\DashboardController@storeSavedPosition');
	Route::put('/position/{id}/mark_applied', 'Settings\DashboardController@storeAppliedPosition');

	// Remove Saved Positions & Applied Positions
	Route::post('/position/{id}/remove_from_dashboard', 'Settings\DashboardController@removeSavedPosition');
	Route::post('/position/{id}/remove_applied', 'Settings\DashboardController@removeAppliedPosition');

	// Show all Positions
	Route::get('/positions', 'Pages\PositionController@index');
	Route::get('/positions/state/{state}', 'Pages\PositionController@index');

	// Get all Positions that a specific department owns
	Route::get('/settings/department/{id}/positions', 'Settings\Position\SettingsPositionController@allDepartmentPositions');

	// Add Position
	Route::post('/settings/position/position_add', 'Settings\Position\SettingsPositionController@store');

	// Show Position Profile
	Route::get('/settings/position/{id}/position_profile', 'Settings\Position\SettingsPositionController@show');

	// Update Position Profile
	Route::put('/settings/position/{id}/position_update', 'Settings\Position\SettingsPositionController@update');

	// Uplaod the 1st Document
	Route::put('/settings/position/{id}/doc1_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1_title');
	Route::post('/settings/position/{id}/doc1_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1_url');
	Route::post('/settings/position/{id}/doc1_update', 'Settings\Position\Docs\PositionDocsController@storeDoc1');

	// Uplaod the 2nd Document
	Route::put('/settings/position/{id}/doc2_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2_title');
	Route::post('/settings/position/{id}/doc2_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2_url');
	Route::post('/settings/position/{id}/doc2_update', 'Settings\Position\Docs\PositionDocsController@storeDoc2');

	// Uplaod the 3rd Document
	Route::put('/settings/position/{id}/doc3_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3_title');
	Route::post('/settings/position/{id}/doc3_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3_url');
	Route::post('/settings/position/{id}/doc3_update', 'Settings\Position\Docs\PositionDocsController@storeDoc3');

	// Uplaod the 4th Document
	Route::put('/settings/position/{id}/doc4_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4_title');
	Route::post('/settings/position/{id}/doc4_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4_url');
	Route::post('/settings/position/{id}/doc4_update', 'Settings\Position\Docs\PositionDocsController@storeDoc4');

	// Uplaod the 5th Document
	Route::put('/settings/position/{id}/doc5_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5_title');
	Route::post('/settings/position/{id}/doc5_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5_url');
	Route::post('/settings/position/{id}/doc5_update', 'Settings\Position\Docs\PositionDocsController@storeDoc5');

	// Uplaod the 6th Document
	Route::put('/settings/position/{id}/doc6_title_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6_title');
	Route::post('/settings/position/{id}/doc6_url_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6_url');
	Route::post('/settings/position/{id}/doc6_update', 'Settings\Position\Docs\PositionDocsController@storeDoc6');

	// Get Position Count for Kiosk
	Route::get('/spark/kiosk/positions', 'Kiosk\MetricsController@positions');

	// ---------- Featured Position ---------- //
	// Show Featured Position
	Route::get('/position/{id}/featured', 'FeaturedPositionController@show');

	// Get Random Featured Position for Display
	Route::get('/positions/get_featured', 'FeaturedPositionController@example');

	// Show all Featured Positions
	Route::get('/positions/featured', 'FeaturedPositionController@index');

	// Add Featured Position
	Route::post('/position/add_featured_position', 'FeaturedPositionController@store');

	// Update Featured Position
	Route::post('/position/update_featured_position', 'FeaturedPositionController@update');

    Route::get('/importDepartments', function() {
        // $file = url('/usfa-census-national.csv');
        // $csv = array_map('str_getcsv', file($file));
        // array_walk($csv, function(&$a) use ($csv) {
        // $a = array_combine($csv[0], $a);
        // });
        // array_shift($csv);
        // // echo "<pre>";print_r($csv);echo "</pre>";

        // foreach ( $csv as $dept ) {
        //     $department = new Department;

        //     $department->owner_id = 1;
        //     $department->fdid = $dept["FDID"] ?: NULL;
        //     $department->name = $dept["Fire Dept Name"];
        //     $department->hq_address1 = $dept["HQ Addr1"] ?: NULL;
        //     $department->hq_address2 = $dept["HQ Addr2"] ?: NULL;
        //     $department->hq_city = $dept["HQ City"] ?: NULL;
        //     $department->hq_state = $dept["HQ State"] ?: NULL;
        //     $department->hq_zip = $dept["HQ Zip"] ?: NULL;
        //     $department->mail_address1 = $dept["Mail Addr1"] ?: NULL;
        //     $department->mail_address2 = $dept["Mail Addr2"] ?: NULL;
        //     $department->mail_po_box = $dept["Mail PO Box"] ?: NULL;
        //     $department->mail_city = $dept["Mail City"] ?: NULL;
        //     $department->mail_state = $dept["Mail State"] ?: NULL;
        //     $department->mail_zip = $dept["Mail Zip"] ?: NULL;
        //     $department->hq_phone = $dept["HQ Phone"] ?: NULL;
        //     $department->hq_fax = $dept["HQ Fax"] ?: NULL;
        //     $department->county = $dept["County"] ?: NULL;
        //     $department->dept_type = $dept["Dept Type"];
        //     $department->org_type = $dept["Organization Type"] ?: NULL;
        //     $department->website = $dept["Website"] ?: NULL;
        //     $department->stations = $dept["Number Of Stations"] ?: NULL;
        //     $department->active_ff_career = $dept["Active Firefighters - Career"] ?: NULL;
        //     $department->active_ff_volunteer = $dept["Active Firefighters - Volunteer"] ?: NULL;
        //     $department->active_ff_paid_per_call = $dept["Active Firefighters - Paid per Call"] ?: NULL;
        //     $department->non_ff_civilian = $dept["Non-Firefighting - Civilian"] ?: NULL;
        //     $department->non_ff_volunteer = $dept["Non-Firefighting - Volunteer"] ?: NULL;
        //     $department->primary_agency_for_em = $dept["primary_agency_for_em"] == 'Yes' ? 1 : 0;

        //     $department->save();
        // }
    });

    Route::get('/mapDepartments', function() {
        // $old_departments = DB::table('departments_old')->get();
        // Department::chunk(100, function ($departments) use ($old_departments) {
        //     foreach ($departments as $department) {
        //         foreach ($old_departments as $old_dept) {
        //             if ( $department->name == $old_dept->department_name && $department->hq_address1 == $old_dept->address1 && $department->hq_city == $old_dept->city && $department->hq_state == $old_dept->state ) {
        //                 $department->oldId = $old_dept->department_id;
        //                 $department->save();
        //                 echo "Department ID: ".$department->id."<br/>";
        //                 echo "Old Dept ID: ".$old_dept->department_id."<br/>";
        //                 echo "<br/>";
        //             }
        //         }
        //     }
        // });
    });

    Route::get('/importPositions', function() {
        // $file = url('/positions.csv');
        // $csv = array_map('str_getcsv', file($file));
        // array_walk($csv, function(&$a) use ($csv) {
        //     $a = array_combine($csv[0], $a);
        // });
        // array_shift($csv);
        // // echo "<pre>";print_r($csv);echo "</pre>";

        // foreach ( $csv as $pos ) {
        //     $position = new Position;

        //     $position->id = $pos['position_id'];
        //     $position->department_id = $pos['department'];
        //     $position->title = $pos['title'];

        //     if ( $pos['position_type'] === 'fulltime' ) {
        //         $pos['position_type'] = 'full-time';
        //     } elseif ( $pos['position_type'] === 'parttime' ) {
        //         $pos['position_type'] = 'part-time';
        //     } else {
        //         $pos['position_type'] = 'paid-on-call';
        //     }
        //     $position->position_type = $pos['position_type'];

        //     $position->state = strtoupper($pos['state']);
        //     $position->application_details = $pos['application_details'].'<br/><br/>'.$pos['details'];
        //     $position->orientation_details = $pos['orientation_details'];
        //     $position->qualifications = $pos['qualifications_to_apply'];
        //     $position->residency_requirements = $pos['residency_requirements'];

        //     if ( $pos['continuous_recruitment_reminder'] ) {
        //         $position->ending = 'continuous';
        //     } elseif ( $pos['duedate'] !== '0000-00-00' ) {
        //         $position->ending = 'duedate';
        //         $duedate = explode('-', $pos['duedate']);
        //         $position->duedate = Carbon::now()->setDateTime($duedate[0], $duedate[1], $duedate[2], '0', '0');
        //     }

        //     $position->publish = $pos['created'] !== '0000-00-00 00:00:00' ? $pos['created'] : Carbon::now();
        //     $position->created_at = $pos['created'] !== '0000-00-00 00:00:00' ? $pos['created'] : Carbon::now();
        //     $position->updated_at = Carbon::now();

        //     if ( $pos['featured'] == 1 ) {
        //         $count = FeaturedPosition::count();
        //         if ( $count < 10 ) {
        //             $featured_position = new FeaturedPosition;
        //             $featured_position->position_id = $pos['position_id'];
        //             $featured_position->created_at = $pos['created'] !== '0000-00-00 00:00:00' ? $pos['created'] : Carbon::now();
        //             $featured_position->updated_at = Carbon::now();
        //             $featured_position->save();
        //             $position->featured = 1;
        //         } else if ( $count == 10 ) {
        //             $featured_position = new FeaturedPosition;
        //             $featured_position->position_id = $pos['position_id'];
        //             $featured_position->created_at = $pos['created'] !== '0000-00-00 00:00:00' ? $pos['created'] : Carbon::now();
        //             $featured_position->updated_at = Carbon::now();
        //             $featured_position->save();
        //             $oldest = FeaturedPosition::active()->orderBy('created_at', 'ASC')->first();
        //             $pos = Position::find($oldest->position_id);
        //             $pos->featured = 0;
        //             $pos->save();
        //             $oldest->delete();
        //             $position->featured = 1;
        //         }
        //     } else {
        //         $position->featured = 0;
        //     }

        //     $position->active = 1;

        //     $position->save();
        // }
    });

    Route::get('/importUsers', function() {
        // $file = url('/test.csv');
        // $csv = array_map('str_getcsv', file($file));
        // array_walk($csv, function(&$a) use ($csv) {
        //     $a = array_combine($csv[0], $a);
        // });
        // array_shift($csv);
        // // echo "<pre>";print_r($csv);echo "</pre>";

        // foreach ( $csv as $usr ) {
        //     $user = new User;

        //     $user->first_name = $usr['firstname'];
        //     $user->last_name = $usr['lastname'];
        //     $user->email = $usr['email'];
        //     $user->password = $usr['password'];
        //     $user->phone = $usr['phone'];
        //     $user->billing_address = $usr['address1'];
        //     $user->billing_address_line_2 = $usr['address2'];
        //     $user->billing_city = $usr['city'];
        //     $user->billing_state = $usr['state'];
        //     $user->billing_zip = $usr['zip'];
        //     $user->billing_country = 'US';
        //     $user->email_notification = 1;

        //     $user->save();
        // }
    });

    Route::get('/updateUserNotificationStates', function() {
        // $file = url('/subscriptions.csv');
        // $csv = array_map('str_getcsv', file($file));
        // array_walk($csv, function(&$a) use ($csv) {
        //     $a = array_combine($csv[0], $a);
        // });
        // array_shift($csv);
        // // echo "<pre>";print_r($csv);echo "</pre>";

        // foreach ( $csv as $usr ) {
        //     $user = User::where('email', $usr['email'])->first();
        //     if ( $user ) {
        //         $notification_states = json_decode($user->notification_states);
        //         // echo "<pre>";print_r($notification_states);echo "</pre>";
        //         if ( $notification_states[0] == "" ) {
        //             // echo "Empty!";
        //             $notification_states = array($usr['state']);
        //         } else {
        //             // echo "Not Empty!";
        //             array_push($notification_states, $usr['state']);
        //         }
        //         array_unique($notification_states);
        //         $user->notification_states = json_encode($notification_states);
        //         $user->save();
        //     }
        // }
    });

    Route::get('/removeDuplicatesFromUserNotificationStates', function() {
        // $users = User::all();

        // foreach ( $users as $user ) {
        //     $notification_states = json_decode($user->notification_states);
        //     // echo "<pre>"; print_r($notification_states); echo "</pre>";
        //     $user->notification_states = json_encode($notification_states);
        //     $user->save();
        // }
    });

    Route::get('/addUserSubscriptions', function() {
        // function getStripeToken() {
        //     $client = new \GuzzleHttp\Client();
        //     $pubKey = "pk_test_4ECOLwcF84mNQerLpCB0TfPT";
        //     $cardNumber = "5555 5555 5555 4444";
        //     $cvc = "123";
        //     $expMonth = "09";
        //     $expYear = "2021";
        //     $headers = [
        //         'Pragma' => 'no-cache',
        //         'Origin' => 'https://js.stripe.com',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'Accept-Language' => 'en-US,en;q=0.8',
        //         'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.36',
        //         'Content-Type' => 'application/x-www-form-urlencoded',
        //         'Accept' => 'application/json',
        //         'Cache-Control' => 'no-cache',
        //         'Referer' => 'https://js.stripe.com/v2/channel.html?stripe_xdm_e=http%3A%2F%2Fwww.beanstalk.dev&stripe_xdm_c=default176056&stripe_xdm_p=1',
        //         'Connection' => 'keep-alive'
        //     ];
        //     $postBody = [
        //         'key' => $pubKey,
        //         'payment_user_agent' => 'stripe.js/Fbebcbe6',
        //         'card[number]' => $cardNumber,
        //         'card[cvc]' => $cvc,
        //         'card[exp_month]' => $expMonth,
        //         'card[exp_year]' => $expYear,
        //     ];
        //     $response = $client->post('https://api.stripe.com/v1/tokens', [
        //         'headers' => $headers,
        //         'form_params' => $postBody
        //     ]);
        //     $response = json_decode($response->getbody()->getContents());
        //     return $response->id;
        // }

        // $file = url('/subscriptions.csv');
        // $handle = fopen($file, 'r');

        // // error checking.
        // if($handle === false) {
        //    die("Error opening $file");
        // }

        // // to skip the header.
        // $skip = true;

        // while (($data = fgetcsv($handle)) !== FALSE) {
        //     // if header..don't print and negate the flag.
        //     if ( $skip ) {
        //         $skip = ! $skip;
        //         // else..print.
        //     } else {      
        //         $user = User::find($data[1]);
        //         echo "User ID: ".$user->id."<br/>";
        //         if ( $data[2] >= 1825 ) {
        //             $data[2] = 1825;
        //         }
        //         if ( $data[2] > 183 ) {
        //             $plan_id = 'fdc-yearly';
        //         } elseif ( $data[2] < 183 && $data[2] > 92 ) {
        //             $plan_id = 'fdc-6-month';
        //         } else {
        //             $plan_id = 'fdc-3-month';
        //         }
        //         $plan = [
        //             'id' => $plan_id,
        //             'trialDays' => $data[2]
        //         ];
        //         echo "Plan ID: ".$plan['id']."<br/>";
        //         echo "Trial Days: ".$plan['trialDays']."<br/>";
        //         echo "<br/>";
        //         // echo "<pre>";print_r($plan);echo "</pre>";
        //         // $data = [
        //         //     'card_country' => $user->billing_country,
        //         //     'name' => $user->first_name.' '.$user->last_name,
        //         //     'stripe_token' => getStripeToken()
        //         // ];

        //         // Spark::interact(Subscribe::class, [
        //         //     $user, (object)$plan, false, $data
        //         // ]);
        //     }
        // }

        // fclose($handle);
    });

    Route::get('/addRecurringUserSubscriptions', function() {
        // function getStripeToken() {
        //     $client = new \GuzzleHttp\Client();
        //     $pubKey = "pk_test_4ECOLwcF84mNQerLpCB0TfPT";
        //     $cardNumber = "4242 4242 4242 4242";
        //     $cvc = "123";
        //     $expMonth = "11";
        //     $expYear = "2020";
        //     $headers = [
        //         'Pragma' => 'no-cache',
        //         'Origin' => 'https://js.stripe.com',
        //         'Accept-Encoding' => 'gzip, deflate',
        //         'Accept-Language' => 'en-US,en;q=0.8',
        //         'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.104 Safari/537.36',
        //         'Content-Type' => 'application/x-www-form-urlencoded',
        //         'Accept' => 'application/json',
        //         'Cache-Control' => 'no-cache',
        //         'Referer' => 'https://js.stripe.com/v2/channel.html?stripe_xdm_e=http%3A%2F%2Fwww.beanstalk.dev&stripe_xdm_c=default176056&stripe_xdm_p=1',
        //         'Connection' => 'keep-alive'
        //     ];
        //     $postBody = [
        //         'key' => $pubKey,
        //         'payment_user_agent' => 'stripe.js/Fbebcbe6',
        //         'card[number]' => $cardNumber,
        //         'card[cvc]' => $cvc,
        //         'card[exp_month]' => $expMonth,
        //         'card[exp_year]' => $expYear,
        //     ];
        //     $response = $client->post('https://api.stripe.com/v1/tokens', [
        //         'headers' => $headers,
        //         'form_params' => $postBody
        //     ]);
        //     $response = json_decode($response->getbody()->getContents());
        //     return $response->id;
        // }

        // $user = User::find(2674);

        // $plan = [
        //     'id' => 'fdc-monthly',
        //     'trialDays' => 32
        // ];
        // $data = [
        //     'billing_address' => $user->billing_address,
        //     'billing_address_line_2' => $user->billing_address_line_2,
        //     'billing_city' => $user->billing_city,
        //     'billing_state' => $user->billing_state,
        //     'billing_zip' => $user->billing_zip,
        //     'billing_country' => $user->billing_country,
        //     'card_country' => $user->billing_country,
        //     'name' => $user->first_name.' '.$user->last_name,
        //     'stripe_token' => getStripeToken()
        // ];

        // Spark::interact(Subscribe::class, [
        //     $user, (object)$plan, false, $data
        // ]);

        // $file = url('/recurring_payment_profiles.csv');
        // $csv = array_map('str_getcsv', file($file));
        // array_walk($csv, function(&$a) use ($csv) {
        //     $a = array_combine($csv[0], $a);
        // });
        // array_shift($csv);
        // echo "<pre>";print_r($csv);echo "</pre>";

        // foreach ( $csv as $usr ) {
            // $email = $usr['email'];
            // echo "Email: ".$email."<br/>";
            // $xdate = $usr['nextbillingdate'];
            // echo "Expiration: ".$xdate."<br/>";

            // $billing = explode(' ', $xdate);
            // $billingDate = explode('-', $billing[0]);
            // $billingTime = explode(':', $billing[1]);
            // $trialDays = Carbon::create($billingDate[0], $billingDate[1], $billingDate[2], $billingTime[0], $billingTime[1], $billingTime[2])->addMonth()->diffInDays(Carbon::now());
            // echo "Trial Days: ".$trialDays."<br/>";

            // $user = User::where('email', $usr['email'])->distinct()->first();
            // echo "<pre>";print_r($user);echo "</pre>";
            // echo "User ID: ".$user->id."<br/>";

            // if ( $user ) {
            //     $plan = [
            //         'id' => 'fdc-monthly',
            //         'trialDays' => $trialDays
            //     ];
            //     echo "<pre>";print_r($plan);echo "</pre>";

            //     $data = [
            //         'billing_address' => $user->billing_address,
            //         'billing_address_line_2' => $user->billing_address_line_2,
            //         'billing_city' => $user->billing_city,
            //         'billing_state' => $user->billing_state,
            //         'billing_zip' => $user->billing_zip,
            //         'billing_country' => $user->billing_country,
            //         'card_country' => $user->billing_country,
            //         'name' => $user->first_name.' '.$user->last_name,
            //         'stripe_token' => getStripeToken()
            //     ];
            //     echo "<pre>";print_r($data);echo "</pre>";
            // }

            // echo "<br/>";
        // }
    });

    Route::get('/updateSubscriptionFromTrialToCancel', function() {
        // $subscriptions = DB::table('subscriptions')->whereNotNull('trial_ends_at')->get();
        // foreach ( $subscriptions as $subscription ) {
        //     DB::table('subscriptions')->update(['ends_at' => $subscription->trial_ends_at, 'trial_ends_at' => NULL]);
        //     $user = User::find($subscription->user_id);
        //     $user->card_brand = NULL;
        //     $user->card_last_four = NULL;
        //     $user->trial_ends_at = NULL;
        //     $user->save();
        // }
    });
});