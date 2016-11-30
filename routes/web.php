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

    Route::get('/positionsDepartments', function() {
        // $positions = Position::orderBy('department_id')->get();

        // foreach ( $positions as $position ) {
        //     echo $position->department_id.'<br/>';
        // }

        // $old_department_ids = array(60,62,231,339,366,398,483,487,489,592,616,642,670,736,736,737,804,828,841,877,889,890,958,976,1137,1182,1201,1209,1257,1257,1281,1382,1423,1478,1588,1603,1647,1660,2080,2204,2407,2585,2588,2714,2759,2787,2801,2801,2801,2801,2893,2947,2952,2963,2967,2974,3043,3048,3155,3155,3284,3334,3371,3373,3403,3453,3453,3453,3471,3477,3671,3676,3698,3765,3781,3786,3796,3803,3804,3932,4003,4012,4012,4059,4220,4266,4266,4273,4294,4305,4340,4355,4361,4361,4362,4369,4396,4400,4417,4423,4423,4429,4436,4436,4436,4436,4456,4457,4484,4486,4499,4512,4514,4527,4537,4551,4617,4624,4633,4633,4633,4633,4645,4651,4705,4713,4791,4843,4868,4930,4934,5087,5096,5107,5114,5289,5358,5417,5461,5508,5601,5602,5606,5618,5626,5797,5798,5848,5949,6006,6026,6083,6110,6162,6228,6300,6317,6345,6471,6520,6535,6660,6679,6687,6740,6763,6865,7016,7106,7112,7227,7358,7429,7429,7455,7470,7501,7506,7551,7615,7776,7791,7874,7950,7970,7980,8099,8111,8133,8202,8230,8243,8342,8354,8407,8474,8476,8503,8523,8575,8583,8650,8706,8718,8881,8930,8930,9029,9029,9031,9066,9107,9151,9151,9172,9172,9180,9251,9280,9287,9339,9349,9349,9364,9384,9393,9539,9615,9738,9781,9847,9847,9879,9996,10071,10172,10172,10275,10308,10397,10524,10684,10689,10695,10761,10786,10793,10816,10822,10834,10969,10987,11130,11130,11186,11205,11274,11282,11320,11320,11352,11353,11363,11370,11416,11492,11498,11540,11540,11548,11639,11640,11687,11730,11916,11928,11949,11998,12056,12060,12112,12144,12161,12173,12187,12300,12318,12350,12380,12415,12434,12462,12486,12492,12508,12517,12517,12581,12593,12600,12609,12654,12753,12764,12858,12900,12926,12926,12988,13007,13046,13097,13136,13543,13596,13596,13596,13660,13660,13744,14007,14132,14174,14174,14318,14333,14340,14384,14459,14459,14480,14546,14576,14652,14695,14727,14731,14731,14731,14855,14941,14941,15001,15058,15059,15201,15224,15252,15293,15296,15296,15296,15319,15357,15425,15445,15522,15523,15570,15752,15780,15811,15812,16003,16026,16027,16094,16177,16193,16509,16510,16569,16713,16771,16882,16901,16970,17007,17178,17205,17268,17279,17285,17296,17327,17490,17545,17574,17599,17657,17728,17931,17947,18043,18097,18097,18130,18163,18280,18280,18309,18349,18349,18350,18381,18398,18448,18480,18518,18531,18532,18555,18574,18580,18623,18628,18638,18643,18668,18671,18900,18978,19120,19215,19242,19251,19310,19324,19366,19368,19546,19553,19586,19586,19586,19591,19628,19828,19828,19882,19884,19884,19884,19998,19998,19998,20093,20134,20219,20219,20272,20288,20288,20289,20289,20306,20311,20483,20564,20605,20696,20714,20838,20958,21070,21074,21092,21110,21120,21120,21284,21289,21307,21336,21363,21363,21363,21455,21479,21483,21506,21513,21517,21525,21633,21640,21689,21735,21742,21772,21817,21928,21941,21956,21956,21962,22047,22053,22124,22249,22300,22304,22311,22317,22393,22437,22478,22478,22525,22529,22529,22576,22576,22578,22585,22643,22684,22732,22760,22760,22787,22995,23014,23016,23142,23324,23344,23404,23413,23462,23462,23702,23782,23784,23898,23926,24045,24137,24149,24149,24201,24205,24334,24341,24344,24438,24438,24544,24580,24640,24655,24699,24796,24852,25011,25045,25089,25099,25131,25179,25221,25234,25241,25306,25322,25348,25446,25451,25468,25554,25556,25576,25634,25666,25712,25763,25776,25869,25919,25919,25919,26000,26000,26010,26011,26011,26023,26044,26044,26044,26049,26071,26071,26071,26071,26071,26071,26071,26071,26071,26091,26098,26099,26101,26105,26105,26130,26132,26133,26139,26147,26169,26174,26174,26182,26204,26213,26348,26352,26379,26381,26390,26411,26411,26422,26425,26460,26477,26488,26502,26536,26551,26552,26553,26553,26553,26553,26553,26553,26558,26563,26569,26572,26574,26577,26580,26580,26580,26580,26581,26582,26587,26588,26589,26591,26592,26593,26594,26595,26596,26597,26601);

        // $old_departments = DB::table('departments_old')->whereIn('department_id', $old_department_ids)->orderBy('department_id', 'ASC')->get();

        // foreach ( $old_departments as $old_department ) {
        //     $department = Department::where('name', $old_department->department_name)->where('hq_address1', $old_department->address1)->where('hq_city', $old_department->city)->first();
            
        //     if ( $department ) {
        //         Department::where('id', $department->id)->update(['oldId' => $old_department->department_id]);
        //         // echo $old_department->department_id.' - '.$department->id.'<br/>';
        //         // echo $department->name.'<br/>';
        //         // echo "<br/><br/>";
        //     } else {
        //         echo $old_department->department_id.'<br/>';
        //     }
        // }

        $unmatchedIds = array(958,976,1182,1257,1281,1382,1423,1588,2407,2759,2801,2963,2974,3453,3471,3671,3932,4003,4059,4266,4273,4305,4340,4361,4362,4369,4417,4429,4436,4456,4486,4499,4537,4617,4624,4651,4791,4843,4868,4930,5114,5602,5606,5797,6083,6110,6300,6317,6520,6679,6740,6865,7551,7874,8099,8230,8243,8474,8476,8650,8718,8881,9029,9066,9107,9151,9339,9349,9879,10684,10793,10816,10969,10987,11205,11282,11320,11352,11353,11363,11492,11498,11639,11640,11998,12056,12187,12300,12318,12350,12415,12434,12486,12508,12517,12581,12609,12764,12988,13007,13097,13136,13596,13744,14174,14318,14340,14459,14546,14576,14652,14727,14731,14855,14941,15001,15058,15201,15224,15252,15523,15752,16026,16027,16177,16901,17178,17279,17296,17327,17490,17574,17657,17728,17947,18280,18309,18381,18480,18531,18555,18580,19242,19366,19628,19884,20093,20134,20288,20696,21074,21307,21479,21525,21742,21772,21817,21928,21941,21956,21962,22124,22249,22300,22304,22311,22393,22437,22478,22529,22578,22585,22732,22760,23014,23413,23702,23926,24137,24201,24334,24341,24544,24655,24796,25089,25131,25179,25241,25468,25634,25712,26000,26010,26011,26023,26044,26049,26071,26091,26098,26099,26101,26105,26132,26133,26139,26147,26169,26174,26182,26204,26213,26348,26352,26381,26390,26411,26422,26425,26460,26477,26488,26502,26536,26551,26552,26553,26558,26563,26569,26572,26574,26577,26580,26581,26582,26587,26588,26589,26591,26592,26593,26594,26595,26596,26597,26601);

        $old_departments = DB::table('departments_old')->whereIn('department_id', $unmatchedIds)->orderBy('department_id', 'ASC')->get();

        foreach ( $old_departments as $old_department ) {
            echo $old_department->department_id.'<br/>';
        }
    });

    Route::get('/addUserSubscriptions', function() {
        $file = url('/subscriptions.csv');

        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        array_shift($csv); # remove column header

        foreach ( $csv as $info ) {
            // echo "<pre>"; print_r($info); echo "</pre>";

            $id = $info['id'];
            $email = $info['email'];
            $trialDays = $info['trialDays'];

            $subscriber = DB::table('subscriptions')->where('user_id', $id)->first();
            if ( ! $subscriber ) {
                echo $id.',"'.$email.'",'.$trialDays.'<br/>';
            }
        }
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