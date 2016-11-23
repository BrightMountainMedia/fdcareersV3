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

    Route::get('/addUserSubscriptions', function() {
        // function getStripeToken() {
        //     $client = new \GuzzleHttp\Client();
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
        //         'key' => 'pk_live_HmtoTcDEpWkHGE2nQXAmLpGo',
        //         'payment_user_agent' => 'stripe.js/Fbebcbe6',
        //         'card[number]' => '4444 4444 4444 4444',
        //         'card[cvc]' => '123',
        //         'card[exp_month]' => '11',
        //         'card[exp_year]' => '2020',
        //     ];
        //     $response = $client->post('https://api.stripe.com/v1/tokens', [
        //         'headers' => $headers,
        //         'form_params' => $postBody
        //     ]);
        //     $response = json_decode($response->getbody()->getContents());
        //     return $response->id;
        // }

        // $user = User::find(528);

        // $plan = [
        //     'id' => 'fdc-6-month',
        //     'trialDays' => 107
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
    });

    Route::get('/updateSubscriptionFromTrialToCancel', function() {
        // $users = User::whereNotNull('trial_ends_at')->get();
        // foreach ( $users as $user ) {
        //     $user->card_brand = NULL;
        //     $user->card_last_four = NULL;
        //     $user->trial_ends_at = NULL;
        //     $user->save();
        // }
    });
});